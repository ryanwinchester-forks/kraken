<?php namespace SevenShores\Kraken\Http\Controllers\Api;

use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use SevenShores\Kraken\Contracts\TransformerManager;
use SevenShores\Kraken\Http\Controllers\Controller;
use Symfony\Component\DependencyInjection\Dumper\YamlDumper;

class ApiController extends Controller
{
    protected $statusCode = 200;

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
    }

    /**
     * Getter for statusCode
     *
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Setter for statusCode
     *
     * @param int $statusCode Value to set
     *
     * @return self
     */
    public function setStatusCode($statusCode)
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

        return $this->jsonResponse($resource);
    }

    /**
     * @param $data
     * @param $transformer
     * @return mixed
     */
    protected function respondWithCollection($data, $transformer)
    {
        $resource = $this->manager->collection($data, $transformer);

        return $this->jsonResponse($resource);
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

        return $this->jsonResponse($resource);
    }

    /**
     * @param array $array
     * @param array $headers
     * @return mixed
     */
    protected function respondWithArray(array $array, array $headers = [])
    {
        $mimeTypeRaw = \Request::server('HTTP_ACCEPT', '*/*');
        // If its empty or has */* then default to JSON
        if ($mimeTypeRaw === '*/*') {
            $mimeType = 'application/json';
        } else {
            // You will probably want to do something intelligent with charset if provided.
            // This chapter just assumes UTF8 everything everywhere.
            $mimeParts = (array) explode(';', $mimeTypeRaw);
            $mimeType = strtolower($mimeParts[0]);
        }

        switch ($mimeType) {
            case 'application/json':
                $contentType = 'application/json';
                $content = json_encode($array);
                break;
            case 'application/x-yaml':
                $contentType = 'application/x-yaml';
                $dumper = app(YamlDumper::class);
                $content = $dumper->dump($array, 2);
                break;
            default:
                $contentType = 'application/json';
                $content = json_encode([
                    'error' => [
                        'code' => static::CODE_INVALID_MIME_TYPE,
                        'http_code' => 415,
                        'message' => sprintf('Content of type %s is not supported.', $mimeType),
                    ]
                ]);
        }

        $response = response($content, $this->statusCode, $headers);
        $response->header('Content-Type', $contentType);

        return $response;
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

        return $this->respondWithArray([
            'error' => [
                'code' => $errorCode,
                'http_code' => $this->statusCode,
                'message' => $message,
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
     * @param string $orderString
     * @return array
     */
    protected function getOrder($orderString)
    {
        $order = [];

        if (str_contains($orderString, "|")) {
            list($order['column'], $order['direction']) = explode('|', $orderString);
            if (! str_is('desc', $order['direction']) && ! str_is('asc', $order['direction'])) {
                throw new \InvalidArgumentException('Order direction must be either "asc" or "desc".');
            }
        } else {
            $order['column'] = $orderString;
            $order['direction'] = 'asc';
        }

        return $order;
    }
}
