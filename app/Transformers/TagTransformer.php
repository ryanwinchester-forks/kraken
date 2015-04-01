<?php namespace SevenShores\Kraken\Transformers;

use League\Fractal;
use SevenShores\Kraken\Tag;

class TagTransformer extends Transformer
{
    /**
     * @var string
     */
    protected $key = 'tag';

    /**
     * Transform this item object into a generic array.
     *
     * @param Tag $tag
     * @return array
     */
    public function transform(Tag $tag)
    {
        return [
            'id'    => $tag->id,
            'name'  => $tag->name,
            'slug'  => $tag->slug,
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
     * Include Contacts.
     *
     * @param Tag $tag
     * @return \League\Fractal\Resource\Collection
     */
    public function includeContacts(Tag $tag)
    {
        $contacts = $tag->contacts;

        $transformer = new ContactTransformer();

        return $this->collection($contacts, $transformer, str_plural($transformer->getKey()));
    }
}
