<?php namespace Kraken\Entities\Forms;

interface FormRepository {

    public function all();

    public function find($id);

    public function create($input);

    public function update($input);

    public function save();

    public function fields();

    public function contacts();

    public function submit(array $input);
}