<?php

/**
 * @package Sellony Laravel Foundation
 * @author Cemre Fatih Karakulak <cradexco@gmail.com>
 */

namespace Sellony\Foundation\Bootstrap;

use Sellony\Contracts\Foundation\Application;
use Illuminate\Http\Request;

class SetRequestForConsole
{
    /**
     * Bootstrap the given application.
     *
     * @param  \Sellony\Contracts\Foundation\Application  $app
     * @return void
     */
    public function bootstrap(Application $app)
    {
        $uri = $app->make('config')->get('app.url', 'http://localhost');

        $components = parse_url($uri);

        $server = $_SERVER;

        if (isset($components['path'])) {
            $server = array_merge($server, [
                'SCRIPT_FILENAME' => $components['path'],
                'SCRIPT_NAME' => $components['path'],
            ]);
        }

        $app->instance('request', Request::create(
            $uri,
            'GET',
            [],
            [],
            [],
            $server
        ));
    }
}
