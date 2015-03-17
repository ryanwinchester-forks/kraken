<?php namespace SevenShores\Kraken\Repositories;

use SevenShores\Kraken\Contracts\Repository;
use SevenShores\Kraken\Core\EloquentRepository;
use SevenShores\Kraken\Form;

class Forms extends EloquentRepository implements Repository
{
    protected $model = Form::class;
}
