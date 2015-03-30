<?php namespace SevenShores\Kraken\Database;

use Illuminate\Database\Seeder as BaseSeeder;

class Seeder extends BaseSeeder
{
    protected function truncateTable($table)
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');

        \DB::table($table)->truncate();

        \DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}