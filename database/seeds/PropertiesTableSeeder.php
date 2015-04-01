<?php

use Laracasts\TestDummy\Factory;
use SevenShores\Kraken\Property;

class PropertiesTableSeeder extends BaseSeeder
{
    public function run()
    {
        $this->truncateTable('properties');

        // 1	Text	input	text	1	2015-04-01 17:16:57	2015-04-01 17:16:57
        // 2	Email	input	email	1	2015-04-01 17:16:57	2015-04-01 17:16:57
        // 3	Password	input	password	1	2015-04-01 17:16:57	2015-04-01 17:16:57
        // 4	Date	input	date	1	2015-04-01 17:16:57	2015-04-01 17:16:57
        // 5	Radio	input	radio	1	2015-04-01 17:16:57	2015-04-01 17:16:57
        // 6	Checkbox	input	checkbox	1	2015-04-01 17:16:57	2015-04-01 17:16:57
        // 7	Hidden	input	hidden	1	2015-04-01 17:16:57	2015-04-01 17:16:57
        // 8	Textarea	textarea	NULL	0	2015-04-01 17:16:57	2015-04-01 17:16:57
        // 9	Select	select	NULL	0	2015-04-01 17:16:57	2015-04-01 17:16:57
        // 10	Option	option	NULL	0	2015-04-01 17:16:57	2015-04-01 17:16:57

        Property::create([
            'name'     => 'First name',
            'key'      => 'first_name',
            'label'    => 'First name',
            'required' => true,
            'property_type_id' => 1,
        ]);

        Property::create([
            'name'     => 'Last name',
            'key'      => 'last_name',
            'label'    => 'Last name',
            'required' => true,
            'property_type_id' => 1,
        ]);

        Property::create([
            'name'     => 'Street',
            'key'      => 'street',
            'label'    => 'Street address',
            'required' => false,
            'property_type_id' => 1,
        ]);

        Property::create([
            'name'     => 'Province',
            'key'      => 'province',
            'label'    => 'Province',
            'required' => false,
            'property_type_id' => 1,
        ]);

        Property::create([
            'name'     => 'Country',
            'key'      => 'country',
            'label'    => 'Country',
            'required' => false,
            'property_type_id' => 1,
        ]);

        Property::create([
            'name'     => 'Postal code',
            'key'      => 'postal_code',
            'label'    => 'Postal code',
            'required' => false,
            'property_type_id' => 1,
        ]);

        Property::create([
            'name'     => 'Mobile phone',
            'key'      => 'phone_mobile',
            'label'    => 'Mobile phone',
            'required' => false,
            'property_type_id' => 1,
        ]);

        Property::create([
            'name'     => 'Home phone',
            'key'      => 'phone_home',
            'label'    => 'Home phone',
            'required' => false,
            'property_type_id' => 1,
        ]);

        Property::create([
            'name'     => 'Age',
            'key'      => 'age',
            'label'    => 'Age',
            'required' => false,
            'property_type_id' => 1,
        ]);

        Property::create([
            'name'     => 'Gender',
            'key'      => 'gender',
            'label'    => 'Gender',
            'required' => false,
            'property_type_id' => 6,
        ]);

        Property::create([
            'name'     => 'Married',
            'key'      => 'is_married',
            'label'    => 'Married',
            'required' => false,
            'property_type_id' => 6,
        ]);
        
//        Factory::times(20)->create(Property::class);
    }
}
