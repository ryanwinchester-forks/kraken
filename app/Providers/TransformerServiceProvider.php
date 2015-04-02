<?php namespace SevenShores\Kraken\Providers;

use Illuminate\Support\ServiceProvider;
use League\Fractal\Serializer\ArraySerializer;
use League\Fractal\Serializer\SerializerAbstract;
use SevenShores\Kraken\Contracts\TransformerManager;
use SevenShores\Kraken\Services\FractalTransformerManager;

class TransformerServiceProvider extends ServiceProvider {

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
        $this->app->bind(SerializerAbstract::class, ArraySerializer::class);
        $this->app->bind(TransformerManager::class, FractalTransformerManager::class);
    }

}
