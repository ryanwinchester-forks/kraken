<?php

use SevenShores\Kraken;

$factory(Kraken\PropertyType::class, [
    'name'    => $faker->word,
    'element' => $faker->word,
    'type'    => $faker->word,
    'is_void' => $faker->boolean(),
]);
