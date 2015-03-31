<?php

use Laracasts\TestDummy\Factory;
use SevenShores\Kraken\Property;

class PropertiesTableSeeder extends BaseSeeder
{
    public function run()
    {
        $this->truncateTable('properties');
        
        Factory::times(20)->create(Property::class);
    }
}
