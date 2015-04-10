<?php namespace SevenShores\Kraken;

use SevenShores\Kraken\Core\Model;

/**
 * Class Tag
 * @package SevenShores\Kraken
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property \Illuminate\Database\Eloquent\Collection $contacts
 * @property \Illuminate\Database\Eloquent\Collection $forms
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Tag extends Model
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
        'id' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function contacts()
    {
        return $this->morphedByMany(Contact::class, 'taggable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function forms()
    {
        return $this->morphedByMany(Form::class, 'taggable');
    }
}
