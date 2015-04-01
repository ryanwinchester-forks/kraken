<?php

use Faker\Factory as Faker;
use Laracasts\TestDummy\Factory;
use SevenShores\Kraken\Contact;
use SevenShores\Kraken\Tag;

class TaggablesTableSeeder extends BaseSeeder
{
    public function run()
    {
        $this->truncateTable('taggables');

        $faker = Faker::create();
        
        $tagIds = Tag::lists('id');
        $contactIds = Contact::lists('id');

        for ($i = 0; $i < 40; $i++) {
            DB::table('taggables')->insert([
                'tag_id'        => $faker->randomElement($tagIds),
                'taggable_id'   => $faker->randomElement($contactIds),
                'taggable_type' => Contact::class,
            ]);
        }
    }
}
