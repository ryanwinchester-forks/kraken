<?php namespace Kraken\Entities;

abstract class BaseRepository {

    /**
     * @var string
     */
    protected $type;

    /**
     * @param $type
     */
    function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * Get all.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return call_user_func_array(
            [$this->{$this->type}, 'all'],
            []
        );
    }

    /**
     * Make a new instance of entity to query
     *
     * @param array $with
     * @return mixed
     */
    public function make(array $with = array())
    {
        return call_user_func_array(
            [$this->{$this->type}, 'with'],
            [$with]
        );
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
        return call_user_func_array(
            [$this->{$this->type}, 'latest'],
            []
        );
    }

} 