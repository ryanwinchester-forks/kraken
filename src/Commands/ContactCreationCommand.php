<?php namespace Kraken\Contacts;

class ContactCreationCommand {

    /**
     * @var array
     */
    public $input;

    /**
     * @param array $input
     */
    function __construct(array $input)
    {
        $this->input = $input;
    }

}