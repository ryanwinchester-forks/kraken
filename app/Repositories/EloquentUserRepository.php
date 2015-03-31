<?php namespace SevenShores\Kraken\Repositories;

use SevenShores\Kraken\Contracts\Repositories\UserRepository;
use SevenShores\Kraken\User;

class EloquentUserRepository extends EloquentRepository implements UserRepository
{
    protected $model = User::class;
}
