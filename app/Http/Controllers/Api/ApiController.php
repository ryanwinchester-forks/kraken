<?php namespace SevenShores\Kraken\Http\Controllers\Api;

use Illuminate\Http\Request;
use SevenShores\Kraken\Contracts\TransformerManager;
use SevenShores\Kraken\Http\Controllers\Controller;
use Symfony\Component\Yaml\Yaml;

class ApiController extends Controller
{
    const CODE_WRONG_ARGS = 'GEN-INVALID-ARGS';
    const CODE_NOT_FOUND = 'GEN-NOTHING-HERE';
    const CODE_INTERNAL_ERROR = 'GEN-SERVER-ERROR';
    const CODE_UNAUTHORIZED = 'GEN-UNAUTHORIZED';
    const CODE_FORBIDDEN = 'GEN-FORBIDDEN';

    /**
     * @var int
     */
    protected $statusCode = 200;

    /**
     * @var string
     */
    protected $contentType;

    /**
     * @var array
     */
    protected $supportedTypes = [
        'JSON' => 'application/json',
        'YAML' => 'application/x-yaml',
    ];

    /**
     * @var TransformerManager
     */
    protected $manager;

    /**
     * @param TransformerManager $manager
     */
    public function __construct(TransformerManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @return int
     */
    protected function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode Value to set
     * @return $this
     */
    protected function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @param $item
     * @param $transformer
     * @return mixed
     */
    protected function respondWithItem($item, $transformer)
    {
        $resource = $this->manager->item($item, $transformer);

        return $this->respondWithResource($resource);
    }

    /**
     * @param $data
     * @param $transformer
     * @return mixed
     */
    protected function respondWithCollection($data, $transformer)
    {
        $resource = $this->manager->collection($data, $transformer);

        return $this->respondWithResource($resource);
    }

    /**
     * @param $data
     * @param $transformer
     * @param $cursor
     * @return mixed
     */
    protected function respondWithCursor($data, $transformer, $cursor = null)
    {
        $resource = $this->manager->cursorCollection($data, $transformer, $cursor);

        return $this->respondWithResource($resource);
    }

    /**
     * @param $resource
     * @return mixed
     */
    protected function respondWithResource($resource)
    {
        $content = $this->formatResourceForContentType($resource);

        return response($content, $this->getStatusCode(), [
            'Content-Type' => $this->getContentType(),
        ]);
    }

    /**
     * @param string $message
     * @param int $errorCode
     * @return mixed
     */
    protected function respondWithError($message, $errorCode)
    {
        if ($this->statusCode === 200) {
            trigger_error(
                "You better have a really good reason for erroring on a 200...",
                E_USER_WARNING
            );
        }

        return response()->json([
            'error' => [
                'code'      => $errorCode,
                'http_code' => $this->getStatusCode(),
                'message'   => $message,
            ]
        ]);
    }

    /**
     * Generates a Response with a 403 HTTP header and a given message.
     *
     * @param string $message
     * @return Response
     */
    public function errorForbidden($message = 'Forbidden')
    {
        return $this->setStatusCode(403)->respondWithError($message, self::CODE_FORBIDDEN);
    }

    /**
     * Generates a Response with a 500 HTTP header and a given message.
     *
     * @param string $message
     * @return Response
     */
    public function errorInternalError($message = 'Internal Error')
    {
        return $this->setStatusCode(500)->respondWithError($message, self::CODE_INTERNAL_ERROR);
    }

    /**
     * Generates a Response with a 404 HTTP header and a given message.
     *
     * @param string $message
     * @return Response
     */
    public function errorNotFound($message = 'Resource Not Found')
    {
        return $this->setStatusCode(404)->respondWithError($message, self::CODE_NOT_FOUND);
    }

    /**
     * Generates a Response with a 401 HTTP header and a given message.
     *
     * @param string $message
     * @return Response
     */
    public function errorUnauthorized($message = 'Unauthorized')
    {
        return $this->setStatusCode(401)->respondWithError($message, self::CODE_UNAUTHORIZED);
    }

    /**
     * Generates a Response with a 400 HTTP header and a given message.
     *
     * @param string $message
     * @return Response
     */
    public function errorWrongArgs($message = 'Wrong Arguments')
    {
        return $this->setStatusCode(400)->respondWithError($message, self::CODE_WRONG_ARGS);
    }

    /**
     * Get the mime-type from the accept header.
     * Defaults to JSON if unsupported type requested.
     *
     * @return string
     */
    protected function getContentType()
    {
        if (isset($this->contentType)) {
            return $this->contentType;
        }

        $mimeTypeRaw = \Request::server('HTTP_ACCEPT', 'application/json');

        $mimeParts = (array) explode(';', $mimeTypeRaw);
        $mimeType =  strtolower($mimeParts[0]);

        if (in_array($mimeType, $this->supportedTypes)) {
            $this->contentType = $mimeType;
        } else {
            $this->contentType = $this->supportedTypes['JSON'];
        }

        return $this->contentType;
    }

    /**
     * Formats the resource for the requested content type.
     * Default to JSON.
     *
     * @param $resource
     * @return string
     */
    protected function formatResourceForContentType($resource)
    {
        switch ($this->getContentType()) {
            case 'application/x-yaml':
                return Yaml::dump($resource->toArray(), 2);
                break;
            default:
                return $resource->toJson();
        }
    }
}
