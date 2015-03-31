<?php

use Faker\Factory as Faker;
use Laracasts\TestDummy\Factory;
use SevenShores\Kraken\Database\Seeder;
use SevenShores\Kraken\Contact;
use SevenShores\Kraken\Property;

class ContactPropertyTableSeeder extends Seeder
{
    public function run()
    {
        $this->truncateTable('contact_property');

        $faker = Faker::create();
        
        $contactIds = Contact::lists('id');
        $propertyIds = Property::lists('id');

        for ($i = 0; $i < 20; $i++) {
            DB::table('contact_property')->insert([
                'contact_id'  => $faker->randomElement($contactIds),
                'property_id' => $faker->randomElement($propertyIds),
                'value'       => $faker->word,
                'created_at'  => $this->now,
                'updated_at'  => $this->now,
            ]);
        }
    }
}
