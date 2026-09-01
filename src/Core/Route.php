<?php

namespace Src\Core;

use Closure;

class Route
{
    /**
     * All routes registered via get()
     *
     * @var self[]
     */
    private static array $routes = [];

    /**
     * The route's name, used to look it up via matchByName()
     */
    private ?string $name = null;

    /**
     * Create a new route with its HTTP method, path, and callback
     */
    public function __construct(
        private string $method,
        private string $path,
        private Closure|array $callback,
    ) {}

    /**
     * Set a name for the route so it can be looked up later
     */
    public function name(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the route's path
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Run the route's callback and return its result
     */
    public function call()
    {
        $callback = $this->callback;

        if (is_array($callback)) {
            [$class, $method] = $callback;
            $callback = [new $class, $method];
        }

        return call_user_func($callback);
    }

    /**
     * Register a new GET route and return it for chaining
     *
     * The callback may be a closure or a [ControllerClass, 'method'] array,
     * in which case the controller is instantiated when the route is called.
     */
    public static function get(string $path, Closure|array $callback): self
    {
        $route = new self('GET', $path, $callback);

        self::$routes[] = $route;

        return $route;
    }

    /**
     * Find the route matching the given request, if any
     */
    public static function matchByRequest(Request $request): ?self
    {
        foreach (self::$routes as $route) {
            if ($route->method === $request->method && $route->path === $request->path) {
                return $route;
            }
        }

        return null;
    }

    /**
     * Find a route by its registered name, if any
     */
    public static function matchByName(string $name): ?self
    {
        foreach (self::$routes as $route) {
            if ($route->name === $name) {
                return $route;
            }
        }

        return null;
    }
}
