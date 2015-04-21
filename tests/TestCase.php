<?php

use Illuminate\Foundation\Testing\TestCase as OriginalTestCase;
use Laracasts\Integrated\Extensions\Laravel as LaravelTestCase;

class TestCase extends LaravelTestCase
{
    /**
     * Headers used in api test requests.
     *
     * @var array
     */
    protected $headers = [
        'CONTENT_TYPE' => 'application/json',
        'HTTP_ACCEPT'  => 'application/json',
    ];

    /**
     * Set up the tests.
     */
    public function setUp()
    {
        parent::setUp();
        \DB::beginTransaction();
    }

    /**
     * Clean up afterwards.
     */
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
