<?php namespace SevenShores\Kraken\Transformers;

use SevenShores\Kraken\Property;
use SevenShores\Kraken\PropertyType;

class PropertyTransformer extends Transformer
{
    /**
     * List of optional resources to include.
     *
     * @var array
     */
    protected $availableIncludes = [
        'contacts',
        'forms',
        'type',
        'options',
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
            'id'       => (int) $property->id,
            'name'     => $property->name,
            'key'      => $property->key,
            'label'    => $property->label,
            'default'  => $property->default,
            'required' => (bool) $property->required,
        ];
    }

    /**
     * Include property type.
     *
     * @param Property $property
     * @return \League\Fractal\Resource\Item
     */
    public function includeType(Property $property)
    {
        $type = $property->type ?: new PropertyType();

        $transformer = new PropertyTypeTransformer();

        return $this->item($type, $transformer);
    }

    /**
     * Include property children.
     *
     * @param Property $property
     * @return \League\Fractal\Resource\Collection
     */
    public function includeOptions(Property $property)
    {
        $options = $property->options;

        $transformer = new PropertyOptionTransformer();

        return $this->collection($options, $transformer);
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

    /**
     * Include Contacts.
     *
     * @param Property $property
     * @return \League\Fractal\Resource\Collection
     */
    public function includeContacts(Property $property)
    {
        $contacts = $property->contacts;

        $transformer = new ContactTransformer();

        return $this->collection($contacts, $transformer);
    }
}
