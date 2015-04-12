<?php namespace SevenShores\Kraken\Transformers;

use SevenShores\Kraken\Property;

class ContactPropertyTransformer extends Transformer
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'type',
    ];

    /**
     * Transform this item object into a generic array.
     *
     * @param Property $property
     * @return array
     */
    public function transform(Property $property)
    {
        return [
            'id'    => (int) $property->id,
            'name'  => $property->name,
            'key'   => $property->key,
            'label' => $property->label,
            'value' => $property->pivot->value,
        ];
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Include property type.
     *
     * @param Property $property
     * @return \League\Fractal\Resource\Item
     */
    public function includeType(Property $property)
    {
        $type = $property->type;

        return $this->item($type, new PropertyTypeTransformer());
    }

    /**
     * Include Forms.
     *
     * @param Property $property
     * @return \League\Fractal\Resource\Collection
     */
    public function includeForms(Property $property)
    {
        $forms = $property->forms;

        return $this->collection($forms, new FormTransformer());
    }
}
