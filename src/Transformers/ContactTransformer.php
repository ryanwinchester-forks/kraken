<?php namespace Kraken\Transformers;

use Kraken\Models\Contact;
use League\Fractal\TransformerAbstract;

class ContactTransformer extends TransformerAbstract {

    /**
     * @var Contact
     */
    private $contact;

    /**
     * @param Contact $contact
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * @param User $user
     * @return array
     */
    public function transform(Contact $contact)
    {
        return [
            'id'    => (int) $contact->id,
            'email' => $contact->email
        ];
    }

}