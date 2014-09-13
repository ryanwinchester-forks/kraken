<?php namespace Kraken\Repositories;

abstract class BaseRepository {

    /**
     * @var Model
     */
    protected $model;

    /**
     * Make a new instance of entity to query
     *
     * @param array $with
     * @return mixed
     */
    public function make(array $with = array())
    {
        return $this->model->with($with);
    }

    /**
     * Get all.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * @param $id
     * @param array $with
     * @return mixed
     */
    public function findById($id, array $with = array())
    {
        $query = $this->make($with);

        return $query->find($id);
    }

    /**
     * @return mixed
     */
    public function latest()
    {
        return $this->model->latest();
    }

} 