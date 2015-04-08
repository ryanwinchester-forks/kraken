<?php namespace SevenShores\Kraken\Http;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;

class ApiResponse
{
    /**
     * @var mixed
     */
    private $content;

    /**
     * @var int
     */
    private $status = 200;

    /**
     * @var string
     */
    private $mimeType = 'application/json';

    /**
     * @var string
     */
    private $message;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var Response
     */
    private $response;

    /**
     * @param Request $request
     * @param ResponseFactory $response
     */
    public function __construct(Request $request, ResponseFactory $response)
    {
        $this->request = $request;
        $this->response = $response;
        $this->mimeType = $this->parseMimeType();
    }

    private function parseMimeType()
    {
        $mimeTypeRaw = $this->request->server('HTTP_ACCEPT', '*/*');

        if ($mimeTypeRaw === '*/*') {
            return 'application/json';
        }

        // TODO: something intelligent with charset if provided.
        $mimeParts = (array) explode(';', $mimeTypeRaw);

        return strtolower($mimeParts[0]);
    }

    private function something() {
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
    }

    public function setMimeType($mimeType)
    {
        //
    }

    /**
     * @return mixed
     */
    public function build()
    {
        return $this->response->make(
            $this->content,
            $this->status,
            [
                'Content-Type' => $this->mimeType,
            ]
        );
    }

}