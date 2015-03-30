<?php

use Laracasts\TestDummy\Factory;
use SevenShores\Kraken\Database\Seeder;
use SevenShores\Kraken\Tag;

class TagsTableSeeder extends Seeder {

    public function run()
    {
        $this->truncateTable('tags');

        Factory::times(20)->create(Tag::class);
    }

}