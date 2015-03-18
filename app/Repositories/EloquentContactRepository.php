<?php namespace SevenShores\Kraken\Repositories;

use SevenShores\Kraken\Contact;
use SevenShores\Kraken\Contracts\Repositories\ContactRepository;
use SevenShores\Kraken\Core\EloquentRepository;

class EloquentContactRepository extends EloquentRepository implements ContactRepository
{
    protected $model = Contact::class;
}
