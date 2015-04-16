<?php

use Faker\Factory as Faker;
use Laracasts\TestDummy\Factory;
use SevenShores\Kraken\Form;
use SevenShores\Kraken\Property;

class FormPropertyTableSeeder extends BaseSeeder
{
    private $faker;

    public function run()
    {
        $this->truncateTable('form_property');

        $this->faker = Faker::create();
        
        $formIds = Form::lists('id');
        $propertyIds = Property::lists('id');

        for ($i = 0; $i < 40; $i++) {
            $ids = $this->getUniqueIds($formIds, $propertyIds);
            DB::table('form_property')->insert([
                'form_id'     => $ids['form_id'],
                'property_id' => $ids['property_id'],
                'label'       => $this->faker->sentence(2),
                'default'     => $this->faker->word,
                'required'    => $this->faker->boolean(25),
                'created_at'  => $this->now,
                'updated_at'  => $this->now,
            ]);
        }
    }

    private function getUniqueIds($formIds, $propertyIds)
    {
        $ids = [];
        $unique = false;

        while(! $unique) {
            $formId = $this->faker->randomElement($formIds);
            $propertyId = $this->faker->randomElement($propertyIds);

            $form = Form::find($formId);

            $property = $form->properties->filter(function($property) use ($propertyId) {
                return $property->id === $propertyId;
            });

            if ($property->isEmpty()) {
                $unique = true;
                $ids = [
                    'form_id'     => $formId,
                    'property_id' => $propertyId,
                ];
            }
        }

        return $ids;
    }
}
