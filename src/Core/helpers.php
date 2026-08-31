<?php

use Src\Core\Response;
use Src\Core\Route;
use Src\Core\View;

if (! function_exists('view')) {
    /**
     * Render a page view and return it as a Response object
     */
    function view(string $name, ?array $data = null): Response
    {
        $renderedString = (new View)->render("pages/$name", $data ?? []);

        return new Response($renderedString);
    }
}

if (! function_exists('route')) {
    /**
     * Resolve a named route to its path
     */
    function route(string $name): string
    {
        $route = Route::matchByName($name);

        if (! $route) {
            throw new RuntimeException("Route [{$name}] not found.");
        }

        return $route->getPath();
    }
}
