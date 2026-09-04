<?php

namespace Src\Core\Routing;

use RuntimeException;
use Src\Core\App;

class RouteInspector
{
    /**
     * Whether the given route name matches the currently matched route
     */
    public function current(string $name): bool
    {
        try {
            $route = App::get(Route::class);
        } catch (RuntimeException) {
            return false;
        }

        return $route->getName() === $name;
    }
}
