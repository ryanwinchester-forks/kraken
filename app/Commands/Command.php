<?php namespace SevenShores\Kraken\Commands;

abstract class Command
{
    /**
     * @var Response
     */
    protected $response;

    public function __construct()
    {
        $this->response = app('SevenShores\Kraken\Commands\CommandResponse');
    }
}
