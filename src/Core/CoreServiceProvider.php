<?php

namespace Src\Core;

class CoreServiceProvider implements ServiceProvider
{
    /**
     * Share a single View instance for the whole request
     */
    public function register(Container $container): void
    {
        $container->singleton(RouteRegistry::class, fn () => new RouteRegistry);
        $container->singleton(View::class, fn () => new View);
        $container->singleton(Database::class, fn () => new Database);
    }

    /**
     * Run after every provider has finished registering
     */
    public function boot(Container $container): void
    {
        //
    }
}
