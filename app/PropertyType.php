<?php namespace SevenShores\Kraken;

use SevenShores\Kraken\Core\Model;

class PropertyType extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'is_void' => 'boolean',
    ];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
