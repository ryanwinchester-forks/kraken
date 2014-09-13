<?php namespace Kraken\Entities;

use Kraken\Contracts\Form as FormInterface;
use Kraken\Models\Form;

class EloquentFormRepository extends BaseRepository implements FormInterface {

    /**
     * Constructor
     *
     * @param Form $form
     */
    function __construct(Form $form)
    {
        parent::__construct('form');

        $this->model = $form;
    }

    /**
     * Find a form by ID or slug
     *
     * @param  int $id    Form id
     * @return Model
     */
    public function findBySlug($slug)
    {
        // Otherwise, assume slug
        return $this->model->where('slug', $slug)->first();
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

        return $this->model->fields()->sync($field->id, false);

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

        return $this->model->fields()->detach($field->id);
    }

    public function submit(array $input)
    {
        return $input;
    }

}
