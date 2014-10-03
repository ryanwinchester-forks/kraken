<?php namespace Kraken\Providers;

use Illuminate\Foundation\Support\Providers\FilterServiceProvider as ServiceProvider;

class FilterServiceProvider extends ServiceProvider {

    /**
     * The filters that should run before all requests.
     *
     * @var array
     */
    protected $before = [
        'Kraken\Http\Filters\MaintenanceFilter',
    ];

    /**
     * The filters that should run after all requests.
     *
     * @var array
     */
    protected $after = [
        //
    ];

    /**
     * All available route filters.
     *
     * @var array
     */
    protected $filters = [
        'auth' => 'Kraken\Http\Filters\AuthFilter',
        'auth.basic' => 'Kraken\Http\Filters\BasicAuthFilter',
        'csrf' => 'Kraken\Http\Filters\CsrfFilter',
        'guest' => 'Kraken\Http\Filters\GuestFilter',
    ];

}