<?php

use Laracasts\TestDummy\Factory;
use SevenShores\Kraken\Contact;

class ContactsTableSeeder extends BaseSeeder
{
    public function run()
    {
        $this->truncateTable('contacts');
        
        Factory::times(20)->create(Contact::class);
    }
}
