<?php namespace Kraken\Entities\Forms;

interface FormRepository {

    public function all();

    public function findById($id, array $with);

    public function findBySlug($slug);

    public function submit(array $input);

    public function latest();

}