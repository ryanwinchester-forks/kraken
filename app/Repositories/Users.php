<?php namespace SevenShores\Kraken\Repositories;

use SevenShores\Kraken\User;
use SevenShores\Kraken\Contracts\Repository;
use SevenShores\Kraken\Core\EloquentRepository;

class Users extends EloquentRepository implements Repository
{
    protected $model = User::class;
}
