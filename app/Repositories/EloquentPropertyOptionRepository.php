<?php namespace SevenShores\Kraken\Repositories;

use SevenShores\Kraken\Contracts\Repositories\PropertyOptionRepository;
use SevenShores\Kraken\PropertyOption;

class EloquentPropertyOptionRepository extends EloquentRepository implements PropertyOptionRepository
{
    protected $model = PropertyOption::class;
}
