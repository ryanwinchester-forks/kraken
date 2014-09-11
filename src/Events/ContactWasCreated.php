<?php namespace Kraken\Events;

class ContactWasCreated {

    public $contact;

    function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

}