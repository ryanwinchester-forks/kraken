<?php namespace SevenShores\Kraken\Repositories;

abstract class EloquentRepository
{
    /**
     * @var string
     */
    protected $model;

    /**
     * @return mixed
     */
    protected function make()
    {
        return app($this->model);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->make()->all();
    }

    /**
     * @param int $cursor
     * @param array $options
     * @return mixed
     */
    public function cursor($cursor = 0, $options = [])
    {
        $options['count'] = isset($options['count']) ? (int) $options['count'] : 20;

        if ($options['count'] > 100) {
            $options['count'] = 100;
        }

        return $this->make()
            ->where('id', '>', (int) $cursor)
            ->take($options['count'])
            ->get();
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
