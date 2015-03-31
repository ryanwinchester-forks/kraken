<?php

use Faker\Factory as Faker;
use Laracasts\TestDummy\Factory;
use SevenShores\Kraken\Contact;
use SevenShores\Kraken\Form;

class ContactFormTableSeeder extends BaseSeeder
{
    public function run()
    {
        $this->truncateTable('contact_form');

        $faker = Faker::create();
        
        $contactIds = Contact::lists('id');
        $formIds = Form::lists('id');

        for ($i = 0; $i < 20; $i++) {
            DB::table('contact_form')->insert([
                'contact_id' => $faker->randomElement($contactIds),
                'form_id'    => $faker->randomElement($formIds),
                'created_at' => $this->now,
                'updated_at' => $this->now,
            ]);
        }
    }
}
