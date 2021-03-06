<?php

use Illuminate\Database\Seeder;

class BaseSeeder extends Seeder
{
    protected $now;

    public function __construct()
    {
        $this->now = date("Y-m-d H:i:s");
    }

    protected function truncateTable($table)
    {
        if ($this->isSqlite()) {
            \DB::table($table)->truncate();
        } else {
            \DB::statement('SET FOREIGN_KEY_CHECKS=0');
            \DB::table($table)->truncate();
            \DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }

    private function isSqlite()
    {
        return config('database.default') === 'sqlite' || app()->environment() === 'testing';
    }
}
