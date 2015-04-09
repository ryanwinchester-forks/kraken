<?php namespace SevenShores\Kraken\Transformers;

use League\Fractal;
use SevenShores\Kraken\Property;

class PropertyTransformer extends Transformer
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
     * @return Fractal\Resource\Item
     */
    public function includeType(Property $property)
    {
        $type = $property->type;

        $transformer = new PropertyTypeTransformer();

        return $this->item($type, $transformer);
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

        $transformer = new FormTransformer();

        return $this->collection($forms, $transformer);
    }
}
