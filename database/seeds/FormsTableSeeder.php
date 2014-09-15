<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Kraken\Models\Form;

class FormsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Form::create([
                'name'        => $faker->word,
                'slug'        => Str::slug($faker->sentence(3)),
                'description' => $faker->bs,
                'views'       => $faker->numberBetween(1, 999),
                'submissions' => $faker->numberBetween(1, 999),
			]);
		}
	}

}
