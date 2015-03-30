<?php

use Laracasts\TestDummy\Factory;
use SevenShores\Kraken\Database\Seeder;
use SevenShores\Kraken\User;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $this->truncateTable('users');

        Factory::create('admin_user');

        Factory::times(5)->create(User::class);
    }
}
