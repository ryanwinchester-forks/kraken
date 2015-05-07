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
        //        if (app()->environment() === 'production') {
//            exit(PHP_EOL . "I am saving your bacon!" . PHP_EOL);
//        }

        Model::unguard();

        // Models
        $this->call('TagsTableSeeder');
        $this->call('PropertyTypesTableSeeder');
        $this->call('FormsTableSeeder');
        $this->call('ContactsTableSeeder');
        $this->call('UsersTableSeeder');
        $this->call('FormPropertiesTableSeeder');
        // Pivot tables
        $this->call('ContactPropertyTableSeeder');
        //$this->call('FormPropertyTableSeeder');
        $this->call('ContactFormTableSeeder');
        $this->call('TaggablesTableSeeder');
    }
}
