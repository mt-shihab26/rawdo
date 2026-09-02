<?php

namespace Src\Core;

use RuntimeException;

class RouteHelper
{
    /**
     * Whether the given route name matches the currently matched route
     */
    public function current(string $name): bool
    {
        try {
            $route = App::current()->container()->get(Route::class);
        } catch (RuntimeException) {
            return false;
        }

        return $route->getName() === $name;
    }
}
