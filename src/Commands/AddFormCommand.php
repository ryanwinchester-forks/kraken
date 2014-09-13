<?php namespace Kraken\Commands;

class AddFormCommand {

    public $name;

    public $slug;

    public $description;

    /**
     * @param $name
     * @param $slug
     * @param $description
     */
    function __construct($name, $slug, $description)
    {
        $this->name = $name;
        $this->slug = $slug;
        $this->description = $description;
    }

}
