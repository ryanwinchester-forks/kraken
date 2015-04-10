<?php namespace SevenShores\Kraken\Core;

use Illuminate\Database\Eloquent\Model as Eloquent;

abstract class Model extends Eloquent
{
    /**
     * @param string $relation
     * @param array $ids
     * @return mixed
     */
    public function attach($relation, array $ids)
    {
        if (method_exists($this, $relation)) {
            return $this->$relation()->sync($ids, false);
        }

        throw new \InvalidArgumentException("There is no relationship for {$relation} defined.");
    }

    /**
     * @param string $relation
     * @param array $ids
     * @return mixed
     */
    public function detach($relation, array $ids)
    {
        if (method_exists($this, $relation)) {
            return $this->$relation()->detach($ids);
        }

        throw new \InvalidArgumentException("There is no relationship for {$relation} defined.");
    }

    /**
     * @param string $relation
     * @param array $ids
     * @return mixed
     */
    public function sync($relation, array $ids)
    {
        if (method_exists($this, $relation)) {
            return $this->$relation()->sync($ids);
        }

        throw new \InvalidArgumentException("There is no relationship for {$relation} defined.");
    }
}
