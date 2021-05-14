<?php

namespace Sellony\Routing;

use Illuminate\Support\ServiceProvider;

class RoutingServiceProvider extends ServiceProvider
{
    /**
     * Register the router instance.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->singleton('router', function ($app) {
        //     return new Router($app['events'], $app);
        // });
    }
}
