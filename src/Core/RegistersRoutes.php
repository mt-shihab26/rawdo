<?php

namespace Src\Core;

trait RegistersRoutes
{
    /**
     * All routes registered via Route::get()
     *
     * @var Route[]
     */
    private static array $routes = [];

    /**
     * Register a route
     */
    public static function addRoute(Route $route): void
    {
        self::$routes[] = $route;
    }

    /**
     * Find the route matching the given request, if any
     */
    public static function matchRouteByRequest(Request $request): ?Route
    {
        foreach (self::$routes as $route) {
            if ($route->getMethod() === $request->method && $route->getPath() === $request->path) {
                return $route;
            }
        }

        return null;
    }

    /**
     * Find a route by its registered name, if any
     */
    public static function matchRouteByName(string $name): ?Route
    {
        foreach (self::$routes as $route) {
            if ($route->getName() === $name) {
                return $route;
            }
        }

        return null;
    }
}
