<?php

use SevenShores\Kraken;

$factory(Kraken\Tag::class, [
    'name' => $faker->word,
    'slug' => $faker->slug,
]);
