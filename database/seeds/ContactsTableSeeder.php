<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Kraken\Models\Contact;

class ContactsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Contact::create([
                'email' => $faker->email,
                'token' => Hash::make($faker->email),
			]);
		}
	}

}
