<?php namespace SevenShores\Kraken\Repositories;

use SevenShores\Kraken\Contact;
use SevenShores\Kraken\Contracts\Repositories\ContactRepository;
use SevenShores\Kraken\Transformers\ContactTransformer;

class EloquentContactRepository extends EloquentRepository implements ContactRepository
{
    /**
     * @var string
     */
    protected $model = Contact::class;
}
