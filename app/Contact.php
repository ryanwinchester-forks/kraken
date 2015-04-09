<?php namespace SevenShores\Kraken;

use SevenShores\Kraken\Core\Model;

/**
 * Class Contact
 * @package SevenShores\Kraken
 *
 * @property int $id
 * @property string $email
 * @property \Illuminate\Database\Eloquent\Collection $properties
 * @property \Illuminate\Database\Eloquent\Collection $tags
 * @property \Illuminate\Database\Eloquent\Collection $forms
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Contact extends Model
{
    /**
     * Fields not protected from mass-assignment.
     *
     * @var array
     */
    protected $fillable = ['email'];

    /**
     * Properties to cast to a type.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function forms()
    {
        return $this->belongsToMany(Form::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function properties()
    {
        return $this->belongsToMany(Property::class)->withPivot('value')->withTimestamps();
    }
}
