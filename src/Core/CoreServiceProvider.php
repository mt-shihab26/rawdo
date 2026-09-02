<?php

namespace Src\Core;

class CoreServiceProvider implements ServiceProvider
{
    /**
     * Share a single View instance for the whole request
     */
    public function register(Container $container): void
    {
        $container->singleton(View::class, fn () => new View);
        $container->singleton(Database::class, fn () => new Database);
        $container->singleton(RouteRegistry::class, fn () => new RouteRegistry);
    }

    /**
     * Run after every provider has finished registering
     */
    public function boot(Container $container): void
    {
        //
    }
}
