<?php

namespace Src\Core;

class CoreServiceProvider implements ServiceProvider
{
    /**
     * Share a single View instance for the whole request
     */
    public function register(): void
    {
        Container::singleton(View::class, fn () => new View);
    }

    /**
     * Run after every provider has finished registering
     */
    public function boot(): void
    {
        //
    }
}
