<?php namespace SevenShores\Kraken;

use SevenShores\Kraken\Core\Model;

class Form extends Model
{
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
