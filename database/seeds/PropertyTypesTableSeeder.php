<?php

use Laracasts\TestDummy\Factory;
use SevenShores\Kraken\PropertyType;

class PropertyTypesTableSeeder extends BaseSeeder
{
    public function run()
    {
        $this->truncateTable('property_types');

        $propertyTypes = config('setup.properties.types');

        foreach ($propertyTypes as $id => $propertyType) {
            PropertyType::create([
                'id'      => $propertyType['id'],
                'name'    => $propertyType['name'],
                'element' => $propertyType['element'],
                'type'    => $propertyType['type'],
                'is_void' => $propertyType['is_void'],
            ]);
        }

        Factory::times(10)->create(PropertyType::class);
    }
}
