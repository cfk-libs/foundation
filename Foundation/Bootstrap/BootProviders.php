<?php

/**
 * @package Sellony Laravel Foundation
 * @author Cemre Fatih Karakulak <cradexco@gmail.com>
 */

namespace Sellony\Foundation\Bootstrap;

use Sellony\Contracts\Foundation\Application;

class BootProviders
{
    /**
     * Bootstrap the given application.
     *
     * @param  \Sellony\Contracts\Foundation\Application  $app
     * @return void
     */
    public function bootstrap(Application $app)
    {
        $app->boot();
    }
}
