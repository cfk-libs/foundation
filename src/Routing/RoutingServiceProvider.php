<?php

namespace Sellony\Routing;

use Slim\Factory\AppFactory;
use Slim\CallableResolver;
use Psr\Http\Message\ResponseFactoryInterface;
use Slim\Interfaces\CallableResolverInterface;
use Slim\Interfaces\RouteCollectorInterface;
use Slim\Interfaces\RouteResolverInterface;
use Slim\Routing\RouteCollector;
use Slim\Routing\RouteResolver;
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
        $this->app->instance(
            ResponseFactoryInterface::class,
            $responseFactory = AppFactory::determineResponseFactory()
        );

        $this->app->instance(
            CallableResolverInterface::class,
            $callableResolver = new CallableResolver($this->app)
        );

        $this->app->instance(
            RouteCollectorInterface::class,
            $routeCollector = new RouteCollector($responseFactory, $callableResolver, $this->app)
        );

        $this->app->instance(
            RouteResolverInterface::class,
            $routeCollector = new RouteResolver($routeCollector)
        );

        // $this->app->singleton('router', function ($app) {
        //     return new Router($app['events'], $app);
        // });
    }
}
