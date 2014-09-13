<?php namespace Kraken\Models;

class Field extends BaseModel {

    /**
     * The rows that can be assigned by mass-assignment.
     *
     * @var array
     */
    protected $guarded = array();


    /**
     * Contact relationship
     */
    public function contacts()
    {
        return $this->belongsToMany('Kraken\Contacts\Contact')->withTimeStamps();
    }


    /**
     * Form relationship
     */
    public function forms()
    {
        return $this->belongsToMany('Kraken\Contacts\Forms\Form')->withTimeStamps();
    }

}