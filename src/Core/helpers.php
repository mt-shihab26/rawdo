<?php

use Src\Core\App;
use Src\Core\Container;
use Src\Core\Response;
use Src\Core\View;
use Symfony\Component\VarDumper\VarDumper;

if (! function_exists('view')) {
    /**
     * Render a page view and return it as a Response object
     */
    function view(string $name, ?array $data = null): Response
    {
        $renderedString = Container::get(View::class)->render("pages/$name", $data ?? []);

        return new Response($renderedString);
    }
}

if (! function_exists('route')) {
    /**
     * Resolve a named route to its path
     */
    function route(string $name): string
    {
        $route = App::matchRouteByName($name);

        if (! $route) {
            throw new RuntimeException("Route [{$name}] not found.");
        }

        return $route->getPath();
    }
}

if (! function_exists('dump')) {
    /**
     * Dump one or more values without halting execution
     *
     * Returns the single value (or all values) back so it can be chained inline, e.g. return dump($x);
     */
    function dump(mixed ...$values): mixed
    {
        foreach ($values as $value) {
            VarDumper::dump($value);
        }

        return count($values) === 1 ? $values[0] : $values;
    }
}

if (! function_exists('dd')) {
    /**
     * Dump one or more values and halt execution
     */
    function dd(mixed ...$values): never
    {
        dump(...$values);

        exit(1);
    }
}
