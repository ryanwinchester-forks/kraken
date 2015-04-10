<?php namespace SevenShores\Kraken\Commands;

use SevenShores\Kraken\Core\Model;

class CommandResponse
{
    const SUCCESS = 'success';
    const ERROR = 'error';
    const INCOMPLETE = 'incomplete';

    /**
     * @var string
     */
    private $status = self::INCOMPLETE;

    /**
     * @var string
     */
    private $message;

    /**
     * @var Model
     */
    private $model;

    /**
     * Create a new response instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * @param string $message
     * @return bool
     */
    public function success($message = null)
    {
        if (! is_null($message)) {
            $this->setStatus(self::SUCCESS);
            $this->setMessage($message);
        }

        return $this->getStatus() === self::SUCCESS;
    }

    /**
     * @param string $message
     * @return bool
     */
    public function error($message = null)
    {
        if (! is_null($message)) {
            $this->setStatus(self::ERROR);
            $this->setMessage($message);
        }

        return $this->getStatus() === self::ERROR;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param Model $model
     */
    public function setModel(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }
}