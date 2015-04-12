<?php namespace SevenShores\Kraken\Services\EntityManagers;

use SevenShores\Kraken\Core\Model;

abstract class EntityManager
{
    /**
     * @param Model $model
     * @param array $relations
     * @return mixed
     */
    protected function handleRelations(Model $model, array $relations)
    {
        if (isset($relations['attach'])) {
            foreach ($relations['attach'] as $relation => $ids) {
                $model->attach($relation, $ids);
            }
        }

        if (isset($relations['detach'])) {
            foreach ($relations['detach'] as $relation => $ids) {
                $model->detach($relation, $ids);
            }
        }

        if (isset($relations['sync'])) {
            foreach ($relations['sync'] as $relation => $ids) {
                $model->sync($relation, $ids);
            }
        }

        return $model;
    }
}