<?php

namespace Sellony\Foundation\Http;

// use Illuminate\Contracts\Debug\ExceptionHandler;
use Sellony\Contracts\Foundation\Application;
use Sellony\Contracts\Http\Kernel as KernelContract;
use Illuminate\Support\Facades\Facade;

class Kernel implements KernelContract
{
    /**
     * The application implementation.
     *
     * @var \Sellony\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * The bootstrap classes for the application.
     *
     * @var string[]
     */
    protected $bootstrappers = [
        \Sellony\Foundation\Bootstrap\LoadEnvironmentVariables::class,
        \Sellony\Foundation\Bootstrap\LoadConfiguration::class,
        // \Sellony\Foundation\Bootstrap\HandleExceptions::class,
        \Sellony\Foundation\Bootstrap\RegisterFacades::class,
        \Sellony\Foundation\Bootstrap\RegisterProviders::class,
        \Sellony\Foundation\Bootstrap\BootProviders::class,
    ];

    /**
     * Create a new HTTP kernel instance.
     *
     * @param  \Sellony\Contracts\Foundation\Application  $app
     * @return void
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Handle an incoming HTTP request.
     */
    public function handle($request)
    {
        $this->app->instance('request', $request);

        Facade::clearResolvedInstance('request');

        $this->bootstrap();
    }

    /**
     * Bootstrap the application for HTTP requests.
     *
     * @return void
     */
    public function bootstrap()
    {
        if (! $this->app->hasBeenBootstrapped()) {
            $this->app->bootstrapWith($this->bootstrappers());
        }
    }

    /**
     * Call the terminate method on any terminable middleware.
     *
     * @return void
     */
    public function terminate()
    {
        $this->app->terminate();
    }

    /**
     * Get the bootstrap classes for the application.
     *
     * @return array
     */
    protected function bootstrappers()
    {
        return $this->bootstrappers;
    }

    /**
     * Get the Laravel application instance.
     *
     * @return \Sellony\Contracts\Foundation\Application
     */
    public function getApplication()
    {
        return $this->app;
    }
}
