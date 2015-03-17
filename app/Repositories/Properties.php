<?php namespace SevenShores\Kraken\Repositories;

use SevenShores\Kraken\Contracts\Repository;
use SevenShores\Kraken\Core\EloquentRepository;
use SevenShores\Kraken\Property;

class Properties extends EloquentRepository implements Repository
{
    protected $model = Property::class;
}
