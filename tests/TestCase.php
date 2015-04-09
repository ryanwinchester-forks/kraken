<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    public function setUp()
    {
        parent::setUp();
        \DB::beginTransaction();
    }

    public function tearDown()
    {
        \DB::rollback();
        parent::tearDown();
    }

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__ . '/../bootstrap/app.php';

        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

        return $app;
    }
}
