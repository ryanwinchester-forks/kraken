<?php namespace Kraken\Repositories;

use Kraken\Contracts\Form as FormInterface;
use Kraken\Models\Form;
use Kraken\Events\FormWasAdded;

class EloquentFormRepository extends BaseRepository implements FormInterface {

    /**
     * Constructor
     *
     * @param Form $form
     */
    function __construct(Form $form)
    {
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

    public function add(array $formData)
    {
        $form = $this->model->create($formData);

        $form->raise(new FormWasAdded($form->id, $form->name));

        return $form;
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

    public function paginate($limit = null)
    {
        if ( ! $limit || $limit > 20)
            $limit = 20;

        return $this->model->paginate($limit);
    }

}
