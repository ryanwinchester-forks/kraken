<?php namespace SevenShores\Kraken\Providers;

use Illuminate\Support\ServiceProvider;
use SevenShores\Kraken\Contracts\ContactRepository;
use SevenShores\Kraken\Repositories\Contacts;

class RepositoryServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(ContactRepository::class, Contacts::class);
	}

}
