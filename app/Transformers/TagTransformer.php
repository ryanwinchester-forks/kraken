<?php namespace SevenShores\Kraken\Transformers;

use SevenShores\Kraken\Tag;

class TagTransformer extends Transformer
{
    /**
     * List of optional resources to include.
     *
     * @var array
     */
    protected $availableIncludes = [
        'contacts',
        'forms',
    ];

    /**
     * Transform this item object into a generic array.
     *
     * @param Tag $tag
     * @return array
     */
    public function transform(Tag $tag)
    {
        return [
            'id'          => (int) $tag->id,
            'name'        => $tag->name,
            'slug'        => $tag->slug,
            'description' => $tag->description,
        ];
    }

    /**
     * Include Contacts.
     *
     * @param Tag $tag
     * @return \League\Fractal\Resource\Collection
     */
    public function includeContacts(Tag $tag)
    {
        $contacts = $tag->contacts;

        $transformer = new ContactTransformer();

        return $this->collection($contacts, $transformer);
    }

    /**
     * Include Forms.
     *
     * @param Tag $tag
     * @return \League\Fractal\Resource\Collection
     */
    public function includeForms(Tag $tag)
    {
        $forms = $tag->forms;

        $transformer = new FormTransformer();

        return $this->collection($forms, $transformer);
    }
}
