<?php namespace SevenShores\Kraken\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class TestCommand extends Command {

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

        $result['create_db'] = system('touch storage/testing.sqlite');

        $result['migration'] = \Artisan::call('migrate', ['--seed', '--database' => 'test']);;

        $result['unit'] = system('vendor/bin/phpspec run');

        $result['integration'] = system('vendor/bin/phpunit');

        $result['acceptance'] = system('vendor/bin/behat');

        $result['delete_db'] = system('rm storage/testing.sqlite');

        foreach ($result as $name => $output) {
            echo $output;
        }
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
