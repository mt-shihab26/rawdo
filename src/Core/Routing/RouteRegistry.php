<?php

namespace Src\Core\Routing;

use Src\Core\Http\Request;

class RouteRegistry
{
    /**
     * All routes registered via Route::get()/Route::post()
     *
     * @var Route[]
     */
    private array $routes = [];

    /**
     * Register a route
     */
    public function add(Route $route): void
    {
        $this->routes[] = $route;
    }

    /**
     * Find the route matching the given request, if any
     */
    public function matchRequest(Request $request): ?Route
    {
        foreach ($this->routes as $route) {
            if ($route->getMethod() === $request->method && $route->getPath() === $request->path) {
                return $route;
            }
        }

        return null;
    }

    /**
     * Find a route by its registered name, if any
     */
    public function matchName(string $name): ?Route
    {
        foreach ($this->routes as $route) {
            if ($route->getName() === $name) {
                return $route;
            }
        }

        return null;
    }
}
