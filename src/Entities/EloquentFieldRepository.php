<?php namespace Kraken\Entities;

use Kraken\Contracts\Field as FieldInterface;
use Kraken\Models\Field;

class EloquentFieldRepository implements FieldInterface {

    /**
     * @param Field $field
     */
    public function __construct(Field $field)
    {
        $this->model = $field;
    }

    /**
     * Get all Fields
     *
     * @return Illuminate\Database\Eloquent\Collection Eloquent Collection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Find a field by ID or slug
     *
     * @param  int $id    Field id
     * @return Field
     */
    public function find($id)
    {
        // If is numeric, assume id
        if (is_numeric($id))
        {
            return $this->model->find($id);
        }

        // Otherwise, assume slug
        return $this->model->where('name', $id)->first();
    }

    /**
     * Create new Field
     *
     * @param  array $input
     * @return Field
     */
    public function create($input)
    {
        return $this->model->create($input);
    }

    /**
     * Update field
     *
     * @param  array $input
     * @return Field
     */
    public function update($input)
    {
        return $this->model->update($input);
    }

    /**
     * Save field
     *
     * @return Field
     */
    public function save()
    {
        return $this->model->save();
    }

    /**
     * Get related forms
     *
     * @return Field
     */
    public function forms()
    {
        return $this->model->contacts();
    }

    /**
     * Get related contacts
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function contacts()
    {
        return $this->model->contacts();
    }

}
