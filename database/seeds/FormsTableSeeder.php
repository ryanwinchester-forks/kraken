<?php

use Laracasts\TestDummy\Factory;
use SevenShores\Kraken\Form;

class FormsTableSeeder extends BaseSeeder
{
    public function run()
    {
        $this->truncateTable('forms');
        
        Factory::times(5)->create(Form::class);
    }
}
