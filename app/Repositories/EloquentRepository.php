<?php namespace SevenShores\Kraken\Repositories;

abstract class EloquentRepository
{
    /**
     * The default count for paging.
     */
    const DEFAULT_COUNT = 20;

    /**
     * The maximum count for paging.
     */
    const MAX_COUNT = 100;

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
        $count = isset($options['count']) ? (int) $options['count'] : static::DEFAULT_COUNT;

        if ($count > static::MAX_COUNT) {
            $count = static::MAX_COUNT;
        }

        return $this->make()
            ->where('id', '>', (int) $cursor)
            ->take($count)
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
