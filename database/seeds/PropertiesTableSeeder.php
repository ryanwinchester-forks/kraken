<?php

use Laracasts\TestDummy\Factory;
use SevenShores\Kraken\Database\Seeder;
use SevenShores\Kraken\Property;

class PropertiesTableSeeder extends Seeder
{
    public function run()
    {
        $this->truncateTable('properties');
        
        Factory::times(20)->create(Property::class);
    }
}
