<?php namespace Kraken\Models;

use Laracasts\Presenter\PresentableTrait;

class Contact extends BaseModel {

    use PresentableTrait;

    /**
     * @var string
     */
    protected $presenter = 'Kraken\Entities\Contacts\ContactPresenter';

    /**
     * The rows that can't be assigned by mass-assignment.
     *
     * @var array
     */
    protected $guarded = array('id');

    /**
     * Get related fields with their value.
     *
     * @return
     */
    public function fields()
    {
        return $this->belongsToMany('Kraken\Entities\Fields\Field')->withPivot('value')->withTimeStamps();
    }

    /**
     * Get related forms.
     *
     * @return
     */
    public function forms()
    {
        return $this->belongsToMany('Kraken\Entities\Forms\Form')->withTimeStamps();
    }

    /**
     * Add a field and its value.
     *
     * @param string $name  The name of the field.
     * @param string $value The field's value.
     * @return mixed
     */
    public function addField($name, $value)
    {
        if ( ! $this->hasField($name))
        {
            // Can I avoid this dependency somehow? :(
            $field = Field::where('name', $name)->first();

            return $this->fields()->attach($field->id, array('value' => $value));
        }

        return $this;
    }

    /**
     * Add an associative array of fields and their values.
     * In the format $name => $value.
     *
     * @param array $fields Associative array of fields.
     * @return $this
     */
    public function addFields(array $fields)
    {
        foreach ($fields as $name => $value)
        {
            $this->addField($name, $value);
        }

        return $this;
    }

    /**
     * Delete a field.
     *
     * @param  string $name  The name of the field.
     * @return void
     */
    public function deleteField($name)
    {
        return $this->fields()->detach($name);
    }

    /**
     * Check if this already has this field.
     *
     * @param  string  $name The name of the field.
     * @return boolean
     */
    public function hasField($name)
    {
        $collection = $this->fields()->get();

        if ($collection->isEmpty())
            return false;

        // There has GOT to be a better way to check if a field is already attached...
        $field = $collection->filter(function($item) use($name)
        {
            return ($item->name == $name);
        })->first();

        return ! is_null($field);
    }

}
