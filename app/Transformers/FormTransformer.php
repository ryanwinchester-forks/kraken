<?php namespace SevenShores\Kraken\Transformers;

use SevenShores\Kraken\Form;

class FormTransformer extends Transformer
{
    /**
     * List of optional resources to include.
     *
     * @var array
     */
    protected $availableIncludes = [
        'properties',
        'forms',
        'tags',
    ];

    /**
     * Transform this item object into a generic array.
     *
     * @param Form $form
     * @return array
     */
    public function transform(Form $form)
    {
        return [
            'id'   => (int) $form->id,
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

        return $this->collection($properties, new PropertyTransformer());
    }

    /**
     * Include Tags.
     *
     * @param Form $form
     * @return \League\Fractal\Resource\Collection
     */
    public function includeTags(Form $form)
    {
        $tags = $form->tags;

        return $this->collection($tags, new TagTransformer());
    }
}
