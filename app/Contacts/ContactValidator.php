<?php namespace Kraken\Contacts;

use Kraken\Core\Validating\InputValidator;

class ContactValidator extends InputValidator {

    /**
     * Validation rules for contact
     *
     * @var array
     */
    protected $rules = array(
        'email'         => 'required|email|unique:contacts',
    );

}
