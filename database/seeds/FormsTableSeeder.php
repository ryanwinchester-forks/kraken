<?php

use Laracasts\TestDummy\Factory;
use SevenShores\Kraken\Form;

class FormsTableSeeder extends BaseSeeder
{
    public function run()
    {
        $this->truncateTable('forms');

        Form::create([
            'name' => 'My test form',
            'slug' => 'my-test-form',
        ]);
        
        Factory::times(20)->create(Form::class);
    }
}
