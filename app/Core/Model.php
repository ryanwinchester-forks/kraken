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
        $this->verifyRelationshipExists($relation);

        return $this->$relation()->sync($ids, false);
    }

    /**
     * @param string $relation
     * @param array $ids
     * @return mixed
     */
    public function detach($relation, array $ids)
    {
        $this->verifyRelationshipExists($relation);

        return $this->$relation()->detach($ids);
    }

    /**
     * @param string $relation
     * @param array $ids
     * @return mixed
     */
    public function sync($relation, array $ids)
    {
        $this->verifyRelationshipExists($relation);

        return $this->$relation()->sync($ids);
    }

    /**
     * @param string $relation
     */
    protected function verifyRelationshipExists($relation)
    {
        if (! method_exists($this, $relation)) {
            $className = get_class($this);
            throw new \InvalidArgumentException("There is no relationship defined for {$className}::{$relation}()");
        }
    }
}
