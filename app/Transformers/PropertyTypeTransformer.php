<?php namespace SevenShores\Kraken\Transformers;

use League\Fractal;
use SevenShores\Kraken\PropertyType;

class PropertyTypeTransformer extends Transformer
{
    /**
     * @var string
     */
    protected $key = 'type';

    /**
     * Transform this item object into a generic array.
     *
     * @param PropertyType $type
     * @return array
     */
    public function transform(PropertyType $type)
    {
        return [
            'id'      => $type->id,
            'name'    => $type->name,
            'element' => $type->element,
            'type'    => $type->type,
            'is_void' => $type->is_void,
        ];
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }
}
