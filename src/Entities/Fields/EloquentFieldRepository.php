<?php namespace Kraken\Entities\Fields;

class EloquentFieldRepository implements FieldRepository {

    /**
     * @var Field
     */
    protected $field;

    /**
     * @param Field $field
     */
    public function __construct(Field $field)
    {
        $this->field = $field;
    }

    /**
     * Get all Fields
     *
     * @return Illuminate\Database\Eloquent\Collection Eloquent Collection
     */
    public function all()
    {
        return $this->field->all();
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
            return $this->field->find($id);
        }

        // Otherwise, assume slug
        return $this->field->where('name', $id)->first();
    }

    /**
     * Create new Field
     *
     * @param  array $input
     * @return Field
     */
    public function create($input)
    {
        return $this->field->create($input);
    }

    /**
     * Update field
     *
     * @param  array $input
     * @return Field
     */
    public function update($input)
    {
        return $this->field->update($input);
    }

    /**
     * Save field
     *
     * @return Field
     */
    public function save()
    {
        return $this->field->save();
    }

    /**
     * Get related forms
     *
     * @return Field
     */
    public function forms()
    {
        return $this->field->contacts();
    }

    /**
     * Get related contacts
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function contacts()
    {
        return $this->field->contacts();
    }

}
