<?php namespace SevenShores\Kraken\Repositories;

use SevenShores\Kraken\Contracts\Repositories\PropertyRepository;
use SevenShores\Kraken\Property;

class EloquentPropertyRepository extends EloquentRepository implements PropertyRepository
{
    protected $model = Property::class;
}
