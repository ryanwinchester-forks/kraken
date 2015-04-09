<?php

use SevenShores\Kraken;

$factory(Kraken\Contact::class, function ($faker) {

    $email = $faker->email;

    return [
        'email' => $email,
    ];
});
