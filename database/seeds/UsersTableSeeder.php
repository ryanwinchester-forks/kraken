<?php

use Laracasts\TestDummy\Factory;
use SevenShores\Kraken\User;

class UsersTableSeeder extends BaseSeeder
{

    public function run()
    {
        $this->truncateTable('users');

        Factory::create('admin_user');

        Factory::times(5)->create(User::class);
    }
}
