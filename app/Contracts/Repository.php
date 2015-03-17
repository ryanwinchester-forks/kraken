<?php namespace SevenShores\Kraken\Contracts;

interface Repository
{
    public function getAll();

    public function getById($id);
}
