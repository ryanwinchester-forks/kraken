<?php namespace SevenShores\Kraken;

use SevenShores\Kraken\Core\Model;

class Tag extends Model
{
    public function contacts()
    {
        return $this->morphedByMany(Contact::class, 'taggable');
    }

    public function forms()
    {
        return $this->morphedByMany(Form::class, 'taggable');
    }
}
