<?php

namespace Src\Core;

class CoreServiceProvider implements ServiceProvider
{
    /**
     * Share a single View instance for the whole request
     */
    public function register(): void
    {
        App::singleton(View::class, fn () => new View);
        App::singleton(Database::class, fn () => new Database);
        App::singleton(Session::class, fn () => new Session);
    }

    /**
     * Run after every provider has finished registering
     */
    public function boot(): void
    {
        //
    }
}
