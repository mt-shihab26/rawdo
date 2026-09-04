<?php

namespace Src\Core;

use Closure;
use ReflectionClass;
use ReflectionFunction;
use ReflectionFunctionAbstract;
use ReflectionMethod;
use ReflectionNamedType;
use RuntimeException;

class Container
{
    /**
     * Resolved singleton instances, keyed by class/abstract name
     *
     * @var array<string, object>
     */
    private array $instances = [];

    /**
     * Factories registered via singleton(), keyed by abstract name
     *
     * @var array<string, Closure>
     */
    private array $bindings = [];

    /**
     * Create the container, registering itself so it can resolve its own type-hint
     */
    public function __construct()
    {
        $this->instances[self::class] = $this;
    }

    /**
     * Register an already-built instance to be handed out for the given class
     */
    public function instance(string $abstract, object $instance): void
    {
        $this->instances[$abstract] = $instance;
    }

    /**
     * Register a factory whose result is built once and reused for every later resolution
     */
    public function singleton(string $abstract, Closure $factory): void
    {
        $this->bindings[$abstract] = $factory;
    }

    /**
     * Resolve a class from a registered instance/binding only; throws if nothing is registered for it
     */
    public function get(string $class): object
    {
        return $this->resolveRegistered($class) ?? throw new RuntimeException(
            "Nothing is bound for [{$class}]. Use make() to autowire it instead."
        );
    }

    /**
     * Resolve a class via a registered instance/binding, falling back to autowiring its constructor
     */
    public function make(string $class): object
    {
        if ($object = $this->resolveRegistered($class)) {
            return $object;
        }

        $reflection = new ReflectionClass($class);
        $constructor = $reflection->getConstructor();

        if (! $constructor) {
            return new $class;
        }

        return $reflection->newInstanceArgs($this->resolveParameters($constructor));
    }

    /**
     * Call a closure or [class, method] callback, autowiring its type-hinted parameters
     */
    public function call(Closure|array $callback): mixed
    {
        if (is_array($callback)) {
            [$class, $method] = $callback;
            $instance = $this->make($class);
            $reflection = new ReflectionMethod($instance, $method);

            return $instance->$method(...$this->resolveParameters($reflection));
        }

        $reflection = new ReflectionFunction($callback);

        return $callback(...$this->resolveParameters($reflection));
    }

    /**
     * Instantiate each provider, call register() on all, then boot() on all, so any provider's boot() can depend on bindings from any other regardless of load order
     */
    public function registerProviders(array $providers): void
    {
        $providers = array_map(fn (string $provider) => new $provider, $providers);

        foreach ($providers as $provider) {
            $provider->register($this);
        }

        foreach ($providers as $provider) {
            $provider->boot($this);
        }
    }

    /**
     * Resolve a class from a registered instance/binding, building and caching it on first use
     */
    private function resolveRegistered(string $class): ?object
    {
        if (isset($this->instances[$class])) {
            return $this->instances[$class];
        }

        if (isset($this->bindings[$class])) {
            return $this->instances[$class] = ($this->bindings[$class])();
        }

        return null;
    }

    /**
     * Resolve each of the reflected function/method's type-hinted parameters
     */
    private function resolveParameters(ReflectionFunctionAbstract $reflection): array
    {
        $args = [];

        foreach ($reflection->getParameters() as $parameter) {
            $type = $parameter->getType();

            if (! $type instanceof ReflectionNamedType || $type->isBuiltin()) {
                throw new RuntimeException(
                    "Cannot resolve parameter [{$parameter->getName()}] without a class type-hint."
                );
            }

            $args[] = $this->make($type->getName());
        }

        return $args;
    }
}
