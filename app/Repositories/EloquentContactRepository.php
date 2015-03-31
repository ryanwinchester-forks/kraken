<?php namespace SevenShores\Kraken\Repositories;

use SevenShores\Kraken\Contact;
use SevenShores\Kraken\Contracts\Repositories\ContactRepository;

class EloquentContactRepository extends EloquentRepository implements ContactRepository
{
    protected $model = Contact::class;
}
