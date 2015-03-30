<?php namespace SevenShores\Kraken\Transformers;

use League\Fractal;
use SevenShores\Kraken\Contact;

class ContactTransformer extends Fractal\TransformerAbstract
{
    /**
     * List of optional resources to include.
     *
     * @var array
     */
    protected $availableIncludes = [
        'properties',
    ];

    /**
     * Transform this item object into a generic array.
     *
     * @param Contact $contact
     * @return array
     */
    public function transform(Contact $contact)
    {
        return [
            'id'    => $contact->id,
            'email' => $contact->email,
        ];
    }

    /**
     * Include Properties.
     *
     * @param Contact $contact
     * @return \League\Fractal\Resource\Collection
     */
    public function includeProperties(Contact $contact)
    {
        $properties = $contact->properties;

        return $this->collection($properties, new PropertyTransformer());
    }

    /**
     * Include Tags.
     *
     * @param Contact $contact
     * @return Fractal\Resource\Collection
     */
    public function includeTags(Contact $contact)
    {
        $tags = $contact->tags;

        return $this->collection($tags, new TagTransformer());
    }

    /**
     * Include Forms.
     *
     * @param Contact $contact
     * @return \League\Fractal\Resource\Collection
     */
    public function includeForms(Contact $contact)
    {
        $forms = $contact->forms;

        return $this->collection($forms, new FormTransformer());
    }
}
