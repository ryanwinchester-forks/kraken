<?php

use SevenShores\Kraken;

// ------------------------------------------------------------------------
// Normal user
// ------------------------------------------------------------------------

$factory(Kraken\User::class, function ($faker) {

    $password = 'secret123';

    return [
        'first_name' => $faker->firstName,
        'last_name'  => $faker->lastName,
        'email'      => $faker->email,
        'password'   => bcrypt($password),
        'role'       => 'user',
    ];
});


// ------------------------------------------------------------------------
// Admin user
// ------------------------------------------------------------------------

$factory(Kraken\User::class, 'admin_user', function ($faker) {

    $password = 'secret123';

    return [
        'first_name' => $faker->firstName,
        'last_name'  => $faker->lastName,
        'email'      => 'admin@admin.dev',
        'role'       => 'admin',
        'password'   => bcrypt('secret123'),
    ];
});
