<?php

use Laracasts\TestDummy\Factory;
use SevenShores\Kraken\Database\Seeder;
use SevenShores\Kraken\Contact;

class ContactsTableSeeder extends Seeder
{
    public function run()
    {
        $this->truncateTable('contacts');
        
        Factory::times(20)->create(Contact::class);
    }

}