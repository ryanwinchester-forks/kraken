<?php namespace SevenShores\Kraken;

use SevenShores\Kraken\Core\Model;

class Contact extends Model
{
    protected $fillable = ['email'];

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function forms()
    {
        return $this->belongsToMany(Form::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class)->withPivot('value')->withTimestamps();
    }
}
