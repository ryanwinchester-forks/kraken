<?php namespace Kraken\Entities\Contacts;

interface ContactRepository {

    public function all();

    public function findById($id);

    public function findByEmail($email);

    public function create(array $input);

    public function update(array $input);

    public function save();

    public function addField($field, $value);

    public function deleteField($field);
}