<?php

namespace Src\Providers;

use Src\Core\Foundation\Container;
use Src\Core\Foundation\ServiceProvider;

class AppServiceProvider implements ServiceProvider
{
    /**
     * Register bindings into the Container
     */
    public function register(Container $container): void
    {
        //
    }

    /**
     * Run after every provider has finished registering
     */
    public function boot(Container $container): void
    {
        //
    }
}
