<?php

use Laracasts\TestDummy\Factory;
use SevenShores\Kraken\Contact;

class ContactsTableSeeder extends BaseSeeder
{
    public function run()
    {
        //$this->truncateTable('contacts');
        
        Factory::times(1000)->create(Contact::class);
    }
}
