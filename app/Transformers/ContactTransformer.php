<?php namespace SevenShores\Kraken\Transformers;

use SevenShores\Kraken\Contact;

class ContactTransformer extends Transformer
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
     * @param Contact $contact
     * @return array
     */
    public function transform(Contact $contact)
    {
        return [
            'id'    => (int) $contact->id,
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

        return $this->collection($properties, new ContactPropertyTransformer());
    }

    /**
     * Include Tags.
     *
     * @param Contact $contact
     * @return \League\Fractal\Resource\Collection
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
