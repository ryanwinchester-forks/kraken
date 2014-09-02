<?php namespace Kraken\Contacts\Forms;

class FormWasSubmitted {

    public $form;

    function __construct(Form $form)
    {
        $this->form = $form;
    }

}