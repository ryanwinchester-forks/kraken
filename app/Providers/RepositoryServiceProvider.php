<?php namespace SevenShores\Kraken\Providers;

use Illuminate\Support\ServiceProvider;
use SevenShores\Kraken\Contracts\Repositories\ContactRepository;
use SevenShores\Kraken\Contracts\Repositories\FormRepository;
use SevenShores\Kraken\Contracts\Repositories\PropertyRepository;
use SevenShores\Kraken\Contracts\Repositories\PropertyTypeRepository;
use SevenShores\Kraken\Contracts\Repositories\TagRepository;
use SevenShores\Kraken\Contracts\Repositories\UserRepository;
use SevenShores\Kraken\Repositories\EloquentContactRepository;
use SevenShores\Kraken\Repositories\EloquentFormRepository;
use SevenShores\Kraken\Repositories\EloquentPropertyRepository;
use SevenShores\Kraken\Repositories\EloquentPropertyTypeRepository;
use SevenShores\Kraken\Repositories\EloquentTagRepository;
use SevenShores\Kraken\Repositories\EloquentUserRepository;

class RepositoryServiceProvider extends ServiceProvider
{

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
        $this->app->bind(ContactRepository::class, EloquentContactRepository::class);
        $this->app->bind(FormRepository::class, EloquentFormRepository::class);
        $this->app->bind(PropertyRepository::class, EloquentPropertyRepository::class);
        $this->app->bind(PropertyTypeRepository::class, EloquentPropertyTypeRepository::class);
        $this->app->bind(TagRepository::class, EloquentTagRepository::class);
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
    }
}
