<?php

namespace Src\Core\Routing;

use Closure;
use RuntimeException;
use Src\Core\Foundation\App;

class Route
{
    private static string $groupPrefix = '';

    private ?string $name = null;

    /**
     * Create a new route with its HTTP method, path, and callback
     */
    public function __construct(
        private string $method,
        private string $path,
        private Closure|array $callback,
    ) {
        //
    }

    /**
     * Set a name for the route so it can be looked up later
     */
    public function name(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the route's HTTP method
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Get the route's path
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Get the route's name
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Run the route's callback and return its result, autowiring type-hinted parameters (e.g. Request) via the Container
     */
    public function call()
    {
        return App::get()->call($this->callback);
    }

    /**
     * Register a new GET route with the App and return it for chaining; the callback may be a closure or a [ControllerClass, 'method'] array
     */
    public static function get(string $path, Closure|array $callback): self
    {
        return self::register('GET', $path, $callback);
    }

    /**
     * Register a new POST route with the App and return it for chaining
     */
    public static function post(string $path, Closure|array $callback): self
    {
        return self::register('POST', $path, $callback);
    }

    /**
     * Start a route group under the given prefix, e.g. Route::prefix('/signup')->group(fn () => ...)
     */
    public static function prefix(string $prefix): RouteGroup
    {
        return new RouteGroup($prefix);
    }

    /**
     * Run the callback with the given prefix applied to every route it registers, restoring the previous prefix after
     */
    public static function withPrefix(string $prefix, Closure $callback): void
    {
        $previous = self::$groupPrefix;
        self::$groupPrefix = $previous.$prefix;

        $callback();

        self::$groupPrefix = $previous;
    }

    /**
     * Resolve a named route to its path, or get the RouteInspector when called with no name
     */
    public static function resolveByName(?string $name = null): string|RouteInspector
    {
        if ($name === null) {
            return new RouteInspector;
        }
        $route = App::get(RouteRegistry::class)->matchName($name);

        if (! $route) {
            throw new RuntimeException("Route [{$name}] not found.");
        }

        return $route->getPath();
    }

    /**
     * Build a route for the given method, register it with the RouteRegistry, and return it for chaining
     */
    private static function register(string $method, string $path, Closure|array $callback): self
    {
        $route = new self($method, self::prefixedPath($path), $callback);

        App::get(RouteRegistry::class)->add($route);

        return $route;
    }

    /**
     * Apply the current group prefix to a route path, treating "/" as the group's own path rather than appending it
     */
    private static function prefixedPath(string $path): string
    {
        if (self::$groupPrefix === '') {
            return $path;
        }

        return $path === '/' ? self::$groupPrefix : self::$groupPrefix.$path;
    }
}
