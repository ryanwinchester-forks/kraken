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
     * @var string
     */
    protected $key = 'contact';

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

        $transformer = new ContactPropertyTransformer();

        return $this->makecollection($properties, $transformer, str_plural($transformer->getKey()));
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

        return $this->makeCollection($tags, new TagTransformer());
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

        return $this->makeCollection($forms, new FormTransformer());
    }
}
