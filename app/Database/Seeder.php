<?php namespace SevenShores\Kraken\Database;

use Illuminate\Database\Seeder as BaseSeeder;

class Seeder extends BaseSeeder
{
    protected $now;

    public function __construct()
    {
        $this->now = date("Y-m-d H:i:s");
    }

    protected function truncateTable($table)
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');

        \DB::table($table)->truncate();

        \DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
