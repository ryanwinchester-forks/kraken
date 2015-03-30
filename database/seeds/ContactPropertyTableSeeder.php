<?php

use Laracasts\TestDummy\Factory;
use Faker\Factory as Faker;
use SevenShores\Kraken\Database\Seeder;
use SevenShores\Kraken\Contact;

class ContactPropertyTableSeeder extends Seeder
{
    public function run()
    {
        $this->truncateTable('contact_property');

        $faker = Faker::create();
        
        $contactIds = Contact::lists('id');
        $propertyIds = \SevenShores\Kraken\Property::lists('id');

        for ($i = 0; $i < 20; $i++) {
            DB::table('contact_property')->insert([
                'contact_id'  => $faker->randomElement($contactIds),
                'property_id' => $faker->randomElement($propertyIds),
                'value'       => $faker->word,
            ]);
        }
    }
}
