<?php namespace SevenShores\Kraken;

use SevenShores\Kraken\Core\Model;

/**
 * Class Property
 * @package SevenShores\Kraken
 *
 * @property int $id
 * @property string $name
 * @property string $key
 * @property string $label
 * @property string $default
 * @property boolean $required
 * @property \Illuminate\Database\Eloquent\Model $type
 * @property \Illuminate\Database\Eloquent\Model $parent
 * @property \Illuminate\Database\Eloquent\Collection $children
 * @property \Illuminate\Database\Eloquent\Collection $contacts
 * @property \Illuminate\Database\Eloquent\Collection $forms
 * @property \Illuminate\Database\Eloquent\Relations\Pivot $pivot
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Property extends Model
{
    /**
     * Fields protected from mass assignment.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Cast properties to a type.
     *
     * @var array
     */
    protected $casts = [
        'id'                 => 'integer',
        'required'           => 'boolean',
        'property_type_id'   => 'integer',
        'parent_property_id' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Property::class, 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Property::class, 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(PropertyType::class, 'type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options()
    {
        return $this->hasMany(PropertyOption::class, 'property_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function contacts()
    {
        return $this->belongsToMany(Contact::class)->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function forms()
    {
        return $this->belongsToMany(Form::class)->withTimestamps();
    }
}
