<?php

use Laracasts\TestDummy\Factory;
use SevenShores\Kraken\Tag;

class TagsTableSeeder extends BaseSeeder
{

    public function run()
    {
        $this->truncateTable('tags');

        Factory::times(20)->create(Tag::class);
    }
}
