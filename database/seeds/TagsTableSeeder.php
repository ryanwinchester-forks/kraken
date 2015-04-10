<?php

use Laracasts\TestDummy\Factory;
use SevenShores\Kraken\Tag;

class TagsTableSeeder extends BaseSeeder
{

    public function run()
    {
        $this->truncateTable('tags');

        Tag::create([
            'name'        => 'Sports',
            'slug'        => 'sports',
            'description' => 'Related to sports or athletics.',
        ]);

        Factory::times(20)->create(Tag::class);
    }
}
