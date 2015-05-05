<?php

use SevenShores\Kraken;

$factory(Kraken\Property::class, function ($faker) {

    $name = $faker->name;
    $key = str_slug($name, '_');
    $propertyTypeIds = Kraken\PropertyType::lists('id');

    return [
        'name'      => $name,
        'key'       => $key,
        'label'     => $faker->sentence(2),
        'required'  => $faker->boolean(25),
        'type_id'   => $faker->randomElement($propertyTypeIds),
    ];
});
