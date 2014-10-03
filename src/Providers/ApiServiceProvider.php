<?php namespace Kraken\Providers;

use Illuminate\Support\ServiceProvider;
use API;

class ApiServiceProvider extends ServiceProvider {

	public function boot()
	{
		API::transform('Kraken\Models\Contact', 'Kraken\Transformers\ContactTransformer');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        // NOTHIN
	}

}