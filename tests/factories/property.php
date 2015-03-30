<?php

use SevenShores\Kraken;

$factory(Kraken\Property::class, function ($faker) {

    $propertyTypeIds = Kraken\PropertyType::lists('id');
    $propertyTypeId = $faker->randomElement($propertyTypeIds);

    $name = $faker->name;
    $key = str_slug($name, '_');
    $parentId = null;

    $done = false;
    while (! $done) {
        // Currently, property_type 10 is "option" and 9 is "select"
        if ($propertyTypeId === 10) {
            $selectProperties = Kraken\Property::where('property_type_id', 9)->lists('id');
            if (empty($selectProperties)) {
                $propertyTypeId = $faker->randomElement($propertyTypeIds);
            } else {
                $parentId = $faker->randomElement($selectProperties);
                $done = true;
            }
        } else {
            $done = true;
        }
    }

    return [
        'name'     => $name,
        'key'      => $key,
        'label'    => $faker->sentence(2),
        'required' => $faker->boolean(25),
        'property_type_id'   => $propertyTypeId,
        'parent_property_id' => $parentId,
    ];
});
