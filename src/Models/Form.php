<?php namespace Kraken\Models;

class Form extends BaseModel {

    /**
     * The rows protected by mass-assignment.
     *
     * @var array
     */
    protected $guarded = array('id');

    /**
     * Get the related fields.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function fields()
    {
        return $this->belongsToMany('Kraken\Fields\Field', 'field_name');
    }

    /**
     * Get the related contacts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function contacts()
    {
        return $this->belongsToMany('Kraken\Contacts\Contact');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function formable()
    {
        return $this->morphTo();
    }

}