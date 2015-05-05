<?php

use Laracasts\TestDummy\Factory;
use SevenShores\Kraken\Property;
use SevenShores\Kraken\PropertyType;
use SevenShores\Kraken\PropertyOption;

class PropertiesTableSeeder extends BaseSeeder
{
    public function run()
    {
        $this->truncateTable('properties');

        $typeIds = collect(config('setup.properties.types'))->lists('id', 'name');

        $first_name = Property::create([
            'name'     => 'First name',
            'key'      => 'first_name',
            'label'    => 'First name',
            'required' => true,
            'type_id'  => $typeIds['Text'],
        ]);

        $last_name = Property::create([
            'name'     => 'Last name',
            'key'      => 'last_name',
            'label'    => 'Last name',
            'required' => true,
            'type_id'  => $typeIds['Text'],
        ]);

        $street = Property::create([
            'name'     => 'Street',
            'key'      => 'street',
            'label'    => 'Street address',
            'required' => false,
            'type_id'  => $typeIds['Text'],
        ]);

        $province = Property::create([
            'name'     => 'Province',
            'key'      => 'province',
            'label'    => 'Province',
            'required' => false,
            'type_id'  => $typeIds['Text'],
        ]);

        $country = Property::create([
            'name'     => 'Country',
            'key'      => 'country',
            'label'    => 'Country',
            'required' => false,
            'type_id'  => $typeIds['Text'],
        ]);

        $postal_code = Property::create([
            'name'     => 'Postal code',
            'key'      => 'postal_code',
            'label'    => 'Postal code',
            'required' => false,
            'type_id'  => $typeIds['Text'],
        ]);

        $phone_mobile = Property::create([
            'name'     => 'Mobile phone',
            'key'      => 'phone_mobile',
            'label'    => 'Mobile phone',
            'required' => false,
            'type_id'  => $typeIds['Text'],
        ]);

        $phone_home = Property::create([
            'name'     => 'Home phone',
            'key'      => 'phone_home',
            'label'    => 'Home phone',
            'required' => false,
            'type_id'  => $typeIds['Text'],
        ]);

        $age = Property::create([
            'name'     => 'Age',
            'key'      => 'age',
            'label'    => 'Age',
            'required' => false,
            'type_id'  => $typeIds['Text'],
        ]);

        $gender = Property::create([
            'name'     => 'Gender',
            'key'      => 'gender',
            'label'    => 'Gender',
            'required' => false,
            'type_id'  => $typeIds['Select'],
        ]);
        $gender_male = PropertyOption::create([
            'value'       => 'male',
            'label'       => 'Male',
            'property_id' => $gender->id,
        ]);
        $gender_female = PropertyOption::create([
            'value'       => 'female',
            'label'       => 'Female',
            'property_id' => $gender->id,
        ]);
        
        Factory::times(10)->create(Property::class);
    }
}
