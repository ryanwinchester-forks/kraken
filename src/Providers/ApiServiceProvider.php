<?php namespace Kraken\Providers;

use Illuminate\Support\ServiceProvider;
use API;

class ApiServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        API::transform('Kraken\Models\Contact', 'Kraken\Transformers\ContactTransformer');
	}

}