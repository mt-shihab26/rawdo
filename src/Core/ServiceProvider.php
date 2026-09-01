<?php

namespace Src\Core;

interface ServiceProvider
{
    /**
     * Register bindings into the Container
     */
    public function register(): void;

    /**
     * Run after every provider has finished registering
     */
    public function boot(): void;
}
