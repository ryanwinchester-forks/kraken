<?php

use Faker\Factory as Faker;
use Laracasts\TestDummy\Factory;
use SevenShores\Kraken\Form;
use SevenShores\Kraken\Property;

class FormPropertyTableSeeder extends BaseSeeder
{
    public function run()
    {
        $this->truncateTable('form_property');

        $faker = Faker::create();
        
        $formIds = Form::lists('id');
        $propertyIds = Property::lists('id');

        for ($i = 0; $i < 40; $i++) {
            DB::table('form_property')->insert([
                'form_id'     => $faker->randomElement($formIds),
                'property_id' => $faker->randomElement($propertyIds),
                'label'       => $faker->sentence(2),
                'default'     => $faker->word,
                'required'    => $faker->boolean(25),
                'created_at'  => $this->now,
                'updated_at'  => $this->now,
            ]);
        }
    }
}
