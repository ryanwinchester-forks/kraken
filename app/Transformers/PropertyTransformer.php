<?php namespace SevenShores\Kraken\Transformers;

use League\Fractal;
use SevenShores\Kraken\Property;

class PropertyTransformer extends Fractal\TransformerAbstract
{
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
            'type'  => $property->type->name,
            'name'  => $property->title,
            'key'   => $property->name,
            'label' => $property->label,
        ];
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