<?php namespace SevenShores\Kraken\Repositories;

use SevenShores\Kraken\Contracts\Repositories\FormRepository;
use SevenShores\Kraken\Core\EloquentRepository;
use SevenShores\Kraken\Form;

class EloquentFormRepository extends EloquentRepository implements FormRepository
{
    protected $model = Form::class;
}
