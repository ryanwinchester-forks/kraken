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
            'Kraken\Entities\Contacts\ContactRepository',
            'Kraken\Entities\Contacts\EloquentContactRepository'
        );

        // FORMS
        $this->app->bind(
            'Kraken\Entities\Forms\FormRepository',
            'Kraken\Entities\Forms\EloquentFormRepository'
        );

        // FIELDS
        $this->app->bind(
            'Kraken\Entities\Fields\FieldRepository',
            'Kraken\Entities\Fields\EloquentFieldRepository'
        );

        // USERS
        $this->app->bind(
            'Kraken\Entities\Users\UserRepository',
            'Kraken\Entities\Users\EloquentUserRepository'
        );
	}

}