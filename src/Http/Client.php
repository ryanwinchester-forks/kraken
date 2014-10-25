<?php namespace Kraken\Http;

use Kraken\Contracts\Http\Client as HttpClient;
use GuzzleHttp\Client as GuzzleClient;

class Client implements HttpClient {

    /**
     * @var GuzzleClient
     */
    private $client;

    /**
     * @param GuzzleClient $client
     */
    public function __construct(GuzzleClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param $url
     * @param array $options
     * @return mixed
     */
    public function get($url, array $options = [])
    {
        return $this->client->get($url, $options);
    }

    /**
     * @param $url
     * @param array $options
     * @return mixed
     */
    public function post($url, array $options = [])
    {
        return $this->client->post($url, $options);
    }

    /**
     * @param $url
     * @param array $options
     * @return mixed
     */
    public function put($url, array $options = [])
    {
        return $this->client->put($url, $options);
    }

    /**
     * @param $url
     * @param array $options
     * @return mixed
     */
    public function patch($url, array $options = [])
    {
        return $this->client->patch($url, $options);
    }

    /**
     * @param $url
     * @param array $options
     * @return mixed
     */
    public function delete($url, array $options = [])
    {
        return $this->client->delete($url, $options);
    }

    /**
     * @param $url
     * @param array $options
     * @return mixed
     */
    public function head($url, array $options = [])
    {
        return $this->client->head($url, $options);
    }

    /**
     * @param $url
     * @param array $options
     * @return mixed
     */
    public function options($url, array $options = [])
    {
        return $this->client->options($url, $options);
    }
}