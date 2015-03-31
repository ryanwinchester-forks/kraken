<?php

use SevenShores\Kraken\PropertyType;

class PropertyTypesTableSeeder extends BaseSeeder
{
    public function run()
    {
        $this->truncateTable('property_types');

        $propertyTypes = config('setup.properties.types');

        foreach ($propertyTypes as $propertyType) {
            PropertyType::create([
                'name'    => $propertyType['name'],
                'element' => $propertyType['element'],
                'type'    => $propertyType['type'],
                'is_void' => $propertyType['is_void'],
            ]);
        }
    }
}
