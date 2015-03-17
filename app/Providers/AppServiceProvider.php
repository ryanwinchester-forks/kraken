<?php namespace SevenShores\Kraken\Providers;

use Illuminate\Support\ServiceProvider;
use SevenShores\Kraken\Contracts\Repository;
use SevenShores\Kraken\Core\EloquentRepository;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * This service provider is a great spot to register your various container
     * bindings with the application. As you can see, we are registering our
     * "Registrar" implementation here. You can add your own bindings too!
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Illuminate\Contracts\Auth\Registrar',
            'SevenShores\Kraken\Services\Registrar'
        );

        $this->app->bind(Repository::class, EloquentRepository::class);
    }
}
