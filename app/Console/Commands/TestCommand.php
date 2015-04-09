<?php namespace SevenShores\Kraken\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class TestCommand extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'test:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run tests';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $result = array();

        // DATABASE
        $this->info('Setting up database');
        system('touch storage/testing.sqlite');
        echo PHP_EOL;
        system('php artisan migrate --seed --database=test --env=testing');
        echo PHP_EOL;

        // UNIT TESTS
        $this->info('Running unit tests with phpspec:');
        system('vendor/bin/phpspec run');
        echo PHP_EOL;

        // INTEGRATION TESTS
        $this->info('Running integration tests with phpunit:');
        system('vendor/bin/phpunit');
        echo PHP_EOL;

        // ACCEPTANCE TESTS
        $this->info('Running acceptance tests with behat:');
        system('vendor/bin/behat');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['unit', InputArgument::OPTIONAL, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
