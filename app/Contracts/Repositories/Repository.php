<?php namespace SevenShores\Kraken\Contracts\Repositories;

interface Repository
{
    public function getAll();

    public function getById($id);
}
