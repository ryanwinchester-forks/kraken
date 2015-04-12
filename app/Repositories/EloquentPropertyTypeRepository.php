<?php namespace SevenShores\Kraken\Repositories;

use SevenShores\Kraken\Contracts\Repositories\PropertyTypeRepository;
use SevenShores\Kraken\PropertyType;

class EloquentPropertyTypeRepository extends EloquentRepository implements PropertyTypeRepository
{
    protected $model = PropertyType::class;
}
