<?php

/**
 * @package Sellony Laravel Foundation
 * @author Cemre Fatih Karakulak <cradexco@gmail.com>
 */

namespace Sellony\Contracts\Http;

interface Kernel
{
    /**
     * Bootstrap the application for HTTP requests.
     *
     * @return void
     */
    public function bootstrap();

    /**
     * Handle an incoming HTTP request.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle();

    /**
     * Perform any final actions for the request lifecycle.
     *
     * @return void
     */
    public function terminate();

    /**
     * Get the Laravel application instance.
     *
     * @return \Sellony\Contracts\Foundation\Application
     */
    public function getApplication();
}
