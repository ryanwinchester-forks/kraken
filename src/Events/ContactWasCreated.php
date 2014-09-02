<?php namespace Kraken\Contacts;

class ContactWasCreated {

    public $contact;

    function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

}