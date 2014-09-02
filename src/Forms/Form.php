<?php namespace Kraken\Contacts\Forms;

class Form extends \Illuminate\Database\Eloquent\Model {

    /**
     * The rows that can be assigned by mass-assignment.
     *
     * @var array
     */
    protected $guarded = array();

    /**
     * Get the related fields.
     *
     * @return [type] [description]
     */
    public function fields()
    {
        return $this->belongsToMany('Kraken\Contacts\Forms\Field', 'field_name');
    }

    /**
     * Get the related contacts.
     *
     * @return [type] [description]
     */
    public function contacts()
    {
        return $this->belongsToMany('Kraken\Contacts\Forms\Contact');
    }

    public function formable()
    {
        return $this->morphTo();
    }

}