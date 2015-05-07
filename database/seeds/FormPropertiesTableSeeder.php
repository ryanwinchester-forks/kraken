<?php

use Laracasts\TestDummy\Factory;
use SevenShores\Kraken\Form;
use SevenShores\Kraken\Property;
use SevenShores\Kraken\PropertyType;
use SevenShores\Kraken\PropertyOption;

class FormPropertiesTableSeeder extends BaseSeeder
{
    private $typeIds;

    public function __construct()
    {
        parent::__construct();

        $this->typeIds = collect(config('setup.properties.types'))->lists('id', 'name');
    }

    public function run()
    {
        $properties = $this->seedProperties();

        $form = Form::create([
            'name' => 'Perfect form',
            'slug' => 'perfect-form',
        ]);

        $form->properties()->saveMany($properties);
    }

    private function seedProperties()
    {
        $this->truncateTable('properties');

        $properties = [];

        $properties['first_name']= Property::create([
            'name'     => 'First name',
            'key'      => 'first_name',
            'label'    => 'First name',
            'required' => true,
            'type_id'  => $this->typeIds['Text'],
        ]);

        $properties['last_name'] = Property::create([
            'name'     => 'Last name',
            'key'      => 'last_name',
            'label'    => 'Last name',
            'required' => true,
            'type_id'  => $this->typeIds['Text'],
        ]);

        $properties['street']= Property::create([
            'name'     => 'Street',
            'key'      => 'street',
            'label'    => 'Street address',
            'required' => false,
            'type_id'  => $this->typeIds['Text'],
        ]);

        $properties['province'] = Property::create([
            'name'     => 'Province',
            'key'      => 'province',
            'label'    => 'Province',
            'required' => false,
            'type_id'  => $this->typeIds['Text'],
        ]);

        $properties['country']= Property::create([
            'name'     => 'Country',
            'key'      => 'country',
            'label'    => 'Country',
            'required' => false,
            'type_id'  => $this->typeIds['Text'],
        ]);

        $properties['postal_code'] = Property::create([
            'name'     => 'Postal code',
            'key'      => 'postal_code',
            'label'    => 'Postal code',
            'required' => false,
            'type_id'  => $this->typeIds['Text'],
        ]);

        $properties['phone_mobile']= Property::create([
            'name'     => 'Mobile phone',
            'key'      => 'phone_mobile',
            'label'    => 'Mobile phone',
            'required' => false,
            'type_id'  => $this->typeIds['Text'],
        ]);

        $properties['phone_home'] = Property::create([
            'name'     => 'Home phone',
            'key'      => 'phone_home',
            'label'    => 'Home phone',
            'required' => false,
            'type_id'  => $this->typeIds['Text'],
        ]);

        $properties['age']= Property::create([
            'name'     => 'Age',
            'key'      => 'age',
            'label'    => 'Age',
            'required' => false,
            'type_id'  => $this->typeIds['Text'],
        ]);

        $properties['gender'] = Property::create([
            'name'     => 'Gender',
            'key'      => 'gender',
            'label'    => 'Gender',
            'required' => false,
            'type_id'  => $this->typeIds['Select'],
        ]);
        $gender_male = PropertyOption::create([
            'value'       => 'male',
            'label'       => 'Male',
            'property_id' => $properties['gender']->id,
        ]);
        $gender_female = PropertyOption::create([
            'value'       => 'female',
            'label'       => 'Female',
            'property_id' => $properties['gender']->id,
        ]);

        return $properties;
    }
}
