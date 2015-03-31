<?php namespace SevenShores\Kraken\Repositories;

use SevenShores\Kraken\Contracts\Repositories\TagRepository;
use SevenShores\Kraken\Tag;

class EloquentTagRepository extends EloquentRepository implements TagRepository
{
    protected $model = Tag::class;
}
