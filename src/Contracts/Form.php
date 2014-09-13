<?php namespace Kraken\Contracts;

interface Form {

    public function all();

    public function findById($id, array $with);

    public function findBySlug($slug);

    public function submit(array $input);

    public function latest();

}