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
    private static array $instances = [];

    /**
     * Factories registered via bind()/singleton(), keyed by abstract name
     *
     * @var array<string, Closure>
     */
    private static array $bindings = [];

    /**
     * Which bound abstracts should be cached as a singleton after first resolution
     *
     * @var array<string, bool>
     */
    private static array $shared = [];

    /**
     * Register an already-built instance to be handed out for the given class
     */
    public static function instance(string $abstract, object $instance): void
    {
        self::$instances[$abstract] = $instance;
    }

    /**
     * Register a factory that builds a fresh instance every time it's resolved
     */
    public static function bind(string $abstract, Closure $factory): void
    {
        self::$bindings[$abstract] = $factory;
        self::$shared[$abstract] = false;
    }

    /**
     * Register a factory whose result is built once and reused for every later resolution
     */
    public static function singleton(string $abstract, Closure $factory): void
    {
        self::$bindings[$abstract] = $factory;
        self::$shared[$abstract] = true;
    }

    /**
     * Resolve a class from a registered instance/binding only; throws if nothing is registered for it
     */
    public static function get(string $class): object
    {
        return self::resolveRegistered($class) ?? throw new RuntimeException(
            "Nothing is bound for [{$class}]. Use Container::make() to autowire it instead."
        );
    }

    /**
     * Resolve a class via a registered instance/binding, falling back to autowiring its constructor
     */
    public static function make(string $class): object
    {
        if ($object = self::resolveRegistered($class)) {
            return $object;
        }

        $reflection = new ReflectionClass($class);
        $constructor = $reflection->getConstructor();

        if (! $constructor) {
            return new $class;
        }

        return $reflection->newInstanceArgs(self::resolveParameters($constructor));
    }

    /**
     * Resolve a class from a registered instance/binding, or null if nothing is registered for it
     */
    private static function resolveRegistered(string $class): ?object
    {
        if (isset(self::$instances[$class])) {
            return self::$instances[$class];
        }

        if (isset(self::$bindings[$class])) {
            return self::resolveBinding($class);
        }

        return null;
    }

    /**
     * Build (and cache, if shared) the object for a registered binding
     */
    private static function resolveBinding(string $class): object
    {
        $object = (self::$bindings[$class])();

        if (self::$shared[$class]) {
            self::$instances[$class] = $object;
        }

        return $object;
    }

    /**
     * Call a closure or [class, method] callback, autowiring its type-hinted parameters
     */
    public static function call(Closure|array $callback): mixed
    {
        if (is_array($callback)) {
            [$class, $method] = $callback;
            $instance = self::make($class);
            $reflection = new ReflectionMethod($instance, $method);

            return $instance->$method(...self::resolveParameters($reflection));
        }

        $reflection = new ReflectionFunction($callback);

        return $callback(...self::resolveParameters($reflection));
    }

    /**
     * Instantiate each provider, call register() on all, then boot() on all
     *
     * Splitting into two passes means a provider's boot() can safely depend on
     * bindings registered by any other provider, regardless of load order.
     *
     * @param  class-string<ServiceProvider>[]  $providers
     */
    public static function registerProviders(array $providers): void
    {
        $providers = array_map(fn (string $provider) => new $provider, $providers);

        foreach ($providers as $provider) {
            $provider->register();
        }

        foreach ($providers as $provider) {
            $provider->boot();
        }
    }

    /**
     * Resolve each of the reflected function/method's type-hinted parameters
     */
    private static function resolveParameters(ReflectionFunctionAbstract $reflection): array
    {
        $args = [];

        foreach ($reflection->getParameters() as $parameter) {
            $type = $parameter->getType();

            if (! $type instanceof ReflectionNamedType || $type->isBuiltin()) {
                throw new RuntimeException(
                    "Cannot resolve parameter [{$parameter->getName()}] without a class type-hint."
                );
            }

            $args[] = self::make($type->getName());
        }

        return $args;
    }
}
