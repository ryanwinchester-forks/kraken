<?php namespace Kraken\Events;

class FormWasAdded {

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @param int    $id
     * @param string $name
     */
    function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

}