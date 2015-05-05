<?php

use SevenShores\Kraken;

$propertyIds = Kraken\Property::lists('id');

$factory(Kraken\PropertyOption::class, [
    'value'       => $faker->word,
    'label'       => $faker->word,
    'property_id' => $faker->randomElement($propertyIds),
]);
