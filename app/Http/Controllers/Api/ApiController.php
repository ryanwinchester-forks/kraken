<?php namespace SevenShores\Kraken\Http\Controllers\Api;

use Illuminate\Http\Request;
use SevenShores\Kraken\Contracts\TransformerManager;
use SevenShores\Kraken\Http\Controllers\Controller;

class ApiController extends Controller
{
    protected $statusCode = 200;
    protected $contentType = 'application/json';

    const CODE_WRONG_ARGS = 'GEN-INVALID-ARGS';
    const CODE_NOT_FOUND = 'GEN-NOTHING-HERE';
    const CODE_INTERNAL_ERROR = 'GEN-SERVER-ERROR';
    const CODE_UNAUTHORIZED = 'GEN-UNAUTHORIZED';
    const CODE_FORBIDDEN = 'GEN-FORBIDDEN';
    const CODE_INVALID_MIME_TYPE = 'GEN-INVALID-MIME';

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
        $this->setContentType($this->getMimeType());
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
     * @param $contentType
     * @return $this
     */
    protected function setContentType($contentType)
    {
        $this->contentType = $contentType;
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

        return $this->makeResponse($resource);
    }

    /**
     * @param $data
     * @param $transformer
     * @return mixed
     */
    protected function respondWithCollection($data, $transformer)
    {
        $resource = $this->manager->collection($data, $transformer);

        return $this->makeResponse($resource);
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

        return $this->makeResponse($resource);
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

        return $this->makeResponse([
            'error' => [
                'code' => $errorCode,
                'http_code' => $this->statusCode,
                'message' => $message,
            ]
        ]);
    }

    /**
     * @param $resource
     * @return mixed
     */
    protected function makeResponse($resource)
    {
        switch ($this->contentType) {
            case 'application/json':
                return $this->jsonResponse($resource);
                break;
            case 'application/x-yaml':
                return $this->yamlResponse($resource);
                break;
            default:
                $message = sprintf('Content of type %s is not supported.', $this->contentType);

                return $this->setStatusCode(415)
                    ->setContentType('application/json')
                    ->respondWithError($message, static::CODE_INVALID_MIME_TYPE);
        }
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
     *
     * @return string
     */
    protected function getMimeType()
    {
        $mimeTypeRaw = \Request::server('HTTP_ACCEPT', '*/*');

        if ($mimeTypeRaw === '*/*') {
            return 'application/json';
        }

        $mimeParts = (array) explode(';', $mimeTypeRaw);
        return strtolower($mimeParts[0]);
    }
}
