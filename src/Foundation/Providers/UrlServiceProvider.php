<?php


namespace Sellony\Foundation\Providers;

use Admin\App\Kernel\Library\UrlGenerator;
use Illuminate\Support\ServiceProvider;

class UrlServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     * @return void
     */
    public function register()
    {
        $this->app->singleton('url', function ($app) {
            return new UrlGenerator(slim()->getRouteResolver());
        });
    }
}
