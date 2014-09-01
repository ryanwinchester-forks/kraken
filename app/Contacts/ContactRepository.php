<?php namespace Kraken\Contacts;

interface ContactRepository {

    public function all();

    public function find($id);

    public function create($input);

    public function update($input);

    public function save();

    public function fields();

    public function forms();

    public function addField($field, $value);

    public function deleteField($field);
}