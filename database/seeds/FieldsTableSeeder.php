<?php

use Illuminate\Database\Seeder;
use Kraken\Models\Field;

class FieldsTableSeeder extends Seeder {

	public function run()
	{
        Field::create([
            'title'       => 'First name',
            'name'        => 'first_name',
            'description' => 'First name',
            'type'        => 'text',
        ]);

        Field::create([
            'title'       => 'Last name',
            'name'        => 'last_name',
            'description' => 'Last name',
            'type'        => 'text',
        ]);

        Field::create([
            'title'       => 'Address 1',
            'name'        => 'address1',
            'description' => 'Address 1',
            'type'        => 'text',
        ]);

        Field::create([
            'title'       => 'Address 2',
            'name'        => 'address2',
            'description' => 'Address 2',
            'type'        => 'text',
        ]);

        Field::create([
            'title'       => 'City',
            'name'        => 'city',
            'description' => 'City',
            'type'        => 'text',
        ]);

        Field::create([
            'title'       => 'Province',
            'name'        => 'province',
            'description' => 'Province',
            'type'        => 'text',
        ]);

        Field::create([
            'title'       => 'Country',
            'name'        => 'country',
            'description' => 'Country',
            'type'        => 'text',
        ]);

        Field::create([
            'title'       => 'Postal Code',
            'name'        => 'postal_code',
            'description' => 'Postal Code',
            'type'        => 'text',
        ]);

        Field::create([
            'title'       => 'Primary Phone',
            'name'        => 'phone_primary',
            'description' => 'Primary phone',
            'type'        => 'text',
        ]);

        Field::create([
            'title'       => 'Alternate Phone',
            'name'        => 'phone_alternate',
            'description' => 'Alternate phone',
            'type'        => 'text',
        ]);

	}

}
