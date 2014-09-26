<?php namespace Kraken\Commands;

class AddContactCommand extends BaseCommand {

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