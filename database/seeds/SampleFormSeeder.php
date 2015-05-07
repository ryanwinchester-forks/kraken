<?php

use Laracasts\TestDummy\Factory;
use SevenShores\Kraken\Form;

class SampleFormSeeder extends BaseSeeder
{
    public function run()
    {
        Form::create([
            'name' => 'My test form',
            'slug' => 'my-test-form',
        ]);
        
        Factory::times(20)->create(Form::class);
    }
}
