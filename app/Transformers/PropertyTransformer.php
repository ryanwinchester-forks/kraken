<?php namespace SevenShores\Kraken\Transformers;

use League\Fractal;
use SevenShores\Kraken\Property;

class PropertyTransformer extends Fractal\TransformerAbstract
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
            'id'    => $property->id,
            'name'  => $property->title,
            'key'   => $property->name,
            'label' => $property->label,
        ];
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
