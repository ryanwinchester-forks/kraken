<?php

// ----------------------------------------
// TAG
// ----------------------------------------
$factory('SevenShores\Kraken\Tag', [
    'name' => $faker->word,
    'slug' => str_slug($faker->word),
]);

// ----------------------------------------
// PROPERTY
// ----------------------------------------
$factory('SevenShores\Kraken\Property', [
    'name' => $faker->word,
    'slug' => str_slug($faker->word),
]);

// ----------------------------------------
// USER
// ----------------------------------------
$factory('SevenShores\Kraken\User', [
    'first_name' => $faker->firstName,
    'last_name'  => $faker->lastName,
    'email'      => $faker->email,
    'password'   => $faker->password,
]);

// ----------------------------------------
// FORM
// ----------------------------------------
$factory('SevenShores\Kraken\Form', [
    'name' => $faker->word,
    'slug' => str_slug($faker->word),
]);
