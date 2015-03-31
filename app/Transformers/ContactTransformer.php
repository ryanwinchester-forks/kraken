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
     * @var string
     */
    private $key = 'contact';

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
     * @return string
     */
    public function getKey()
    {
        return $this->key;
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

        $transformer = new PropertyTransformer();

        return $this->collection($properties, $transformer, str_plural($transformer));
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

        $transformer = new TagTransformer();

        return $this->collection($tags, $transformer, str_plural($transformer->getKey()));
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

        $transformer = new FormTransformer();

        return $this->collection($forms, $transformer, str_plural($transformer->getKey()));
    }
}
