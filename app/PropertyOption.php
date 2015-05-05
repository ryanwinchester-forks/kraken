<?php namespace SevenShores\Kraken;

use SevenShores\Kraken\Core\Model;

/**
 * Class PropertyOption
 * @package SevenShores\Kraken
 *
 * @property int $id
 * @property string $value
 * @property string $label
 * @property \Illuminate\Database\Eloquent\Model $property
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class PropertyOption extends Model
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
    protected $casts = ['id' => 'integer'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
