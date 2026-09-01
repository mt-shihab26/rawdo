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
     * Resolved singleton instances, keyed by class name
     *
     * @var array<class-string, object>
     */
    private static array $instances = [];

    /**
     * Register an already-built instance to be handed out for the given class
     */
    public static function instance(string $abstract, object $instance): void
    {
        self::$instances[$abstract] = $instance;
    }

    /**
     * Resolve a class, autowiring its constructor's type-hinted dependencies
     */
    public static function make(string $class): object
    {
        if (isset(self::$instances[$class])) {
            return self::$instances[$class];
        }

        $reflection = new ReflectionClass($class);
        $constructor = $reflection->getConstructor();

        if (! $constructor) {
            return new $class;
        }

        return $reflection->newInstanceArgs(self::resolveParameters($constructor));
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
