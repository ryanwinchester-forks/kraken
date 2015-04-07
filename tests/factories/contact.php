<?php

use SevenShores\Kraken;

$factory(Kraken\Contact::class, function ($faker) {

    $email = mt_rand(1, 1000000) . $faker->email;

    return [
        'email' => $email,
    ];
});
