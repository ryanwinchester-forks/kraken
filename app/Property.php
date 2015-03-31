<?php namespace SevenShores\Kraken;

use SevenShores\Kraken\Core\Model;

class Property extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'required'           => 'boolean',
        'property_type_id'   => 'integer',
        'parent_property_id' => 'integer',
    ];

    public function type()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }

    public function contacts()
    {
        return $this->belongsToMany(Contact::class);
    }

    public function forms()
    {
        return $this->belongsToMany(Form::class);
    }
}
