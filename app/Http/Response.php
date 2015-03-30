<?php namespace SevenShores\Kraken\Http;

use SevenShores\Kraken\Core\Model;

class Response
{
    private $model;

    private $status;

    private $message;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function success($message)
    {
        $this->setMessage($message);
        $this->setStatus(200);
    }

    public function fail($message, $status = 500)
    {
        $this->setMessage($message);
        $this->setStatus($status);
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function setObject(Model $object)
    {
        $this->model = $object;
    }

    public function make(array $params)
    {
        $this->status = $params['status'];
        $this->message = $params['message'];
        $this->model = $params['object'];
    }

    public function toJson()
    {
        return $this->model->toJson();
    }
}