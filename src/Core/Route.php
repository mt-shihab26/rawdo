<?php

namespace Src\Core;

use Closure;

class Route
{
    /**
     * The route's name, used to look it up via RouteRegistry::matchName()
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
     * Run the route's callback and return its result
     *
     * The callback's type-hinted parameters (e.g. Request) are autowired via the Container.
     */
    public function call()
    {
        return Container::current()->call($this->callback);
    }

    /**
     * Register a new GET route with the App and return it for chaining
     *
     * The callback may be a closure or a [ControllerClass, 'method'] array,
     * in which case the controller is instantiated when the route is called.
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
     * Build a route for the given method, register it with the RouteRegistry, and return it for chaining
     */
    private static function register(string $method, string $path, Closure|array $callback): self
    {
        $route = new self($method, $path, $callback);

        app(RouteRegistry::class)->add($route);

        return $route;
    }
}
