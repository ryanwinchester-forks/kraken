<?php namespace Kraken\Contacts\Fields;

use Contact;

interface FieldRepository {

    public function all();

    public function find($id);

    public function create($input);

    public function update($input);

    public function save();

    public function forms();

    public function contacts();
}