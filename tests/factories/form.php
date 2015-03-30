<?php

use SevenShores\Kraken;

$factory(Kraken\Form::class, function ($faker) {

    $name = $faker->name;
    $slug = str_slug($name);

    return [
        'name' => $name,
        'slug' => $slug,
    ];
});
