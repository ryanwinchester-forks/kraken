<?php namespace Kraken\Events;

class FormWasSubmitted {

    public $form;

    function __construct(Form $form)
    {
        $this->form = $form;
    }

}