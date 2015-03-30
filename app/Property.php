<?php namespace SevenShores\Kraken;

use SevenShores\Kraken\Core\Model;

class Property extends Model
{
        protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'required' => 'boolean',
    ];


    public function contacts()
    {
        return $this->belongsToMany(Contact::class);
    }

    public function forms()
    {
        return $this->belongsToMany(Form::class);
    }
}
