<?php

namespace Src\Core\Routing;

use RuntimeException;
use Src\Core\Foundation\App;

class RouteInspector
{
    /**
     * Whether the given route name matches the currently matched route
     */
    public function current(string $name): bool
    {
        try {
            /** @var Route $route */
            $route = App::get(Route::class);
        } catch (RuntimeException) {
            return false;
        }

        return $route->getName() === $name;
    }
}
