<?php namespace Kraken\Commands;

class FormSubmitCommand {

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