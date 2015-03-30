<?php

use Laracasts\TestDummy\Factory;
use SevenShores\Kraken\Database\Seeder;
use SevenShores\Kraken\Form;

class FormsTableSeeder extends Seeder
{
    public function run()
    {
        $this->truncateTable('forms');
        
        Factory::times(5)->create(Form::class);
    }

}