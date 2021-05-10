<?php

/**
 * @package Sellony Laravel Foundation
 * @author Cemre Fatih Karakulak <cradexco@gmail.com>
 */

namespace Sellony\Foundation\Bootstrap;

use Sellony\Contracts\Foundation\Application;
use Sellony\Foundation\AliasLoader;
use Sellony\Foundation\PackageManifest;
use Illuminate\Support\Facades\Facade;

class RegisterFacades
{
    /**
     * Bootstrap the given application.
     *
     * @param  \Sellony\Contracts\Foundation\Application  $app
     * @return void
     */
    public function bootstrap(Application $app)
    {
        Facade::clearResolvedInstances();

        Facade::setFacadeApplication($app);

        AliasLoader::getInstance(array_merge(
            $app->make('config')->get('app.aliases', []),
            $app->make(PackageManifest::class)->aliases()
        ))->register();
    }
}
