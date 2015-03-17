<?php namespace SevenShores\Kraken\Core;

abstract class EloquentRepository
{
    /**
     * @return mixed
     */
    protected function make()
    {
        return app()->make($this->model);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->make()->all();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->make()->find($id);
    }
}
