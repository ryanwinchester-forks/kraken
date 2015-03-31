<?php

use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('TagsTableSeeder');
        $this->call('PropertyTypesTableSeeder');
        $this->call('PropertiesTableSeeder');
        $this->call('FormsTableSeeder');
        $this->call('ContactsTableSeeder');
        $this->call('ContactPropertyTableSeeder');
        $this->call('FormPropertyTableSeeder');
        $this->call('ContactFormTableSeeder');
        $this->call('UsersTableSeeder');
    }
}
