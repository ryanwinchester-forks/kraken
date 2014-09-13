<?php namespace Kraken\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        // CONTACTS
        $this->app->bind(
            'Kraken\Contracts\Contact',
            'Kraken\Entities\EloquentContactRepository'
        );

        // FORMS
        $this->app->bind(
            'Kraken\Contracts\Form',
            'Kraken\Entities\EloquentFormRepository'
        );

        // FIELDS
        $this->app->bind(
            'Kraken\Contracts\Field',
            'Kraken\Entities\EloquentFieldRepository'
        );

        // USERS
        $this->app->bind(
            'Kraken\Contracts\User',
            'Kraken\Entities\EloquentUserRepository'
        );
	}

}