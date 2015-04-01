<?php namespace SevenShores\Kraken\Transformers;

use SevenShores\Kraken\Form;

class FormTransformer extends Transformer
{
    /**
     * @var string
     */
    protected $key = 'form';

    /**
     * Transform this item object into a generic array.
     *
     * @param Form $form
     * @return array
     */
    public function transform(Form $form)
    {
        return [
            'id'   => $form->id,
            'name' => $form->name,
            'slug' => $form->slug,
        ];
    }

    /**
     * Include Properties.
     *
     * @param Form $form
     * @return \League\Fractal\Resource\Collection
     */
    public function includeProperties(Form $form)
    {
        $properties = $form->properties;

        return $this->makeCollection($properties, new PropertyTransformer());
    }
}
