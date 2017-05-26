<?php

namespace Maknz\Slack\Laravel;

use RuntimeException;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * The actual provider.
     *
     * @var \Illuminate\Support\ServiceProvider
     */
    protected $provider;

    /**
     * Instantiate the service provider.
     *
     * @param mixed $app
     * @return void
     */
    public function __construct($app)
    {
        parent::__construct($app);

        $this->provider = new ServiceProviderLaravel5($this->app);
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        return $this->provider->boot();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        return $this->provider->register();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['maknz.slack'];
    }
}
