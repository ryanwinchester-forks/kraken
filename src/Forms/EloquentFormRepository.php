<?php namespace Kraken\Contacts\Forms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Kraken\Core\Eventing\EventGenerator;
use Kraken\Contacts\Fields\Field;

class EloquentFormRepository implements FormRepository {

    use EventGenerator;

    /**
     * Form
     *
     * @var [type]
     */
    protected $form;

    /**
     * @var Field
     */
    protected $field;

    /**
     * Constructor
     *
     * @param Form $form [description]
     */
    public function __construct(Form $form, Field $field)
    {
        $this->form = $form;
        $this->field = $field;
    }

    /**
     * Get all Forms
     *
     * @return Collection
     */
    public function all()
    {
        return $this->form->all();
    }

    /**
     * Find a form by ID or slug
     *
     * @param  int $id    Form id
     * @return Model
     */
    public function find($id)
    {
        // If is numeric, assume id
        if (is_numeric($id))
        {
            return $this->form->find($id);
        }

        // Otherwise, assume slug
        return $this->form->where('slug', $id)->first();
    }

    /**
     * Create form
     *
     * @param  [type] $input [description]
     * @return Model
     */
    public function create($input)
    {
        return $this->form->create($input);
    }

    /**
     * Update existing form
     *
     * @param  [type] $input [description]
     * @return Model
     */
    public function update($input)
    {
        return $this->form->update($input);
    }

    /**
     * Save form
     *
     * @return Model
     */
    public function save()
    {
        return $this->form->save();
    }

    /**
     * Get related fields
     *
     * @return Collection
     */
    public function fields()
    {
        return $this->form->belongsToMany('Field');
    }

    /**
     * Get related contacts
     *
     * @return Collection
     */
    public function contacts()
    {
        return $this->form->belongsToMany('Contact');
    }

    /**
     * Adds a field to a form.
     *
     * @param string $label    Name of the field.
     * @param string $required The value to assign to the field.
     * @return Model
     */
    public function addField($field, $label, $required)
    {
        $field = $this->field->where('name', $field)->first();

        return $this->form->fields()->sync($field->id, false);

        // TODO: Add pivot data $label and $is_required
    }

    /**
     * Removes a field from a form.
     *
     * @param  string $field
     * @return Model
     */
    public function deleteField($field)
    {
        $field = $this->field->where('name', $field)->first();

        return $this->form->fields()->detach($field->id);
    }

    public function submit(array $input)
    {
        return $input;
    }

}
