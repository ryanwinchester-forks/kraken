<?php namespace SevenShores\Kraken;

use SevenShores\Kraken\Core\Model;

class Form extends Model
{
    protected $casts = [
        'id' => 'integer',
    ];

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
