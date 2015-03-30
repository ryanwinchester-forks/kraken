<?php namespace SevenShores\Kraken\Transformers;

use League\Fractal;
use SevenShores\Kraken\Tag;

class TagTransformer extends Fractal\TransformerAbstract
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
            'id'    => $tag->id,
            'title' => $tag->title,
            'slug'  => $tag->slug,
            'name'  => $tag->name,
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

        return $this->collection($contacts, new ContactTransformer());
    }
}