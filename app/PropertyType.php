<?php namespace SevenShores\Kraken;

use SevenShores\Kraken\Core\Model;

/**
 * Class PropertyType
 * @package SevenShores\Kraken
 *
 * @property int $id
 * @property string $name
 * @property string $element
 * @property string $type
 * @property boolean $is_void
 * @property \Illuminate\Database\Eloquent\Collection $properties
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class PropertyType extends Model
{
    /**
     * Fields protected from mass-assignment.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Properties to cast to a type.
     *
     * @var array
     */
    protected $casts = [
        'id'      => 'integer',
        'is_void' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
