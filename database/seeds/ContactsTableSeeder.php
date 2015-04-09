<?php

use Laracasts\TestDummy\Factory;
use SevenShores\Kraken\Contact;

class ContactsTableSeeder extends BaseSeeder
{
    public function run()
    {
        $this->truncateTable('contacts');

        Contact::create([
            'email' => 'testmeister@example.com',
        ]);
        
        Factory::times(40)->create(Contact::class);
    }
}
