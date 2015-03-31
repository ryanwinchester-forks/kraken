<?php namespace SevenShores\Kraken\Transformers;

use League\Fractal;
use SevenShores\Kraken\Form;

class FormTransformer extends Fractal\TransformerAbstract
{
    /**
     * @var string
     */
    private $key = 'form';

    /**
     * Transform this item object into a generic array.
     *
     * @param Form $form
     * @return array
     */
    public function transform(Form $form)
    {
        return [
            'id'    => $form->id,
            'type'  => $form->type->name,
            'name'  => $form->title,
            'key'   => $form->name,
            'label' => $form->label,
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
     * Include Properties.
     *
     * @param Form $form
     * @return \League\Fractal\Resource\Collection
     */
    public function includeProperties(Form $form)
    {
        $properties = $form->properties;

        $transformer = new PropertyTransformer();

        return $this->collection($properties, $transformer, str_plural($transformer->getKey()));
    }
}
