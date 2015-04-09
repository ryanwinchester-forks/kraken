<?php namespace SevenShores\Kraken\Transformers;

use League\Fractal;
use SevenShores\Kraken\Tag;

class TagTransformer extends Transformer
{
    /**
     * Transform this item object into a generic array.
     *
     * @param Tag $tag
     * @return array
     */
    public function transform(Tag $tag)
    {
        return [
            'id'    => (int) $tag->id,
            'name'  => $tag->name,
            'slug'  => $tag->slug,
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
}
