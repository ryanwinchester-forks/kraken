<?php namespace SevenShores\Kraken\Transformers;

use SevenShores\Kraken\PropertyOption;

class PropertyOptionTransformer extends Transformer
{
    /**
     * Transform this item object into a generic array.
     *
     * @param PropertyOption $option
     * @return array
     */
    public function transform(PropertyOption $option)
    {
        return [
            'id'    => (int) $option->id,
            'value' => $option->value,
            'label' => $option->label,
        ];
    }
}
