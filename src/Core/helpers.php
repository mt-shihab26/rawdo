<?php

use Src\Core\App;
use Src\Core\Http\HttpException;
use Src\Core\Http\Response;
use Src\Core\Routing\Route;
use Src\Core\Routing\RouteInspector;
use Src\Core\Session;
use Src\Core\View\View;
use Symfony\Component\VarDumper\VarDumper;

if (! function_exists('app')) {
    /**
     * Get the container, or resolve a class through it when given one
     */
    function app(?string $class = null): mixed
    {
        return App::get($class);
    }
}

if (! function_exists('view')) {
    /**
     * Render a page view and return it as a Response object
     */
    function view(string $name, ?array $data = null): Response
    {
        return app(View::class)->page($name, $data);
    }
}

if (! function_exists('route')) {
    /**
     * Resolve a named route to its path, or get the RouteInspector when called with no name
     */
    function route(?string $name = null): string|RouteInspector
    {
        return Route::resolveByName($name);
    }
}

if (! function_exists('redirect')) {
    /**
     * Build a redirect response to the given URL
     */
    function redirect(string $path): Response
    {
        return Response::redirect($path);
    }
}

if (! function_exists('csrf_token')) {
    /**
     * Get the current session's CSRF token
     */
    function csrf_token(): string
    {
        return app(Session::class)->csrfToken();
    }
}

if (! function_exists('csrf_field')) {
    /**
     * Build the hidden input field carrying the CSRF token, for use inside a <form>
     */
    function csrf_field(): string
    {
        return app(Session::class)->csrfField();
    }
}

if (! function_exists('old')) {
    /**
     * Get a value flashed as old input on the previous request's validation failure, or the whole old-input array when called with no key
     */
    function old(?string $key = null, mixed $default = ''): mixed
    {
        return app(Session::class)->old($key, $default);
    }
}

if (! function_exists('errors')) {
    /**
     * Get a validation error flashed on the previous request's failed submission, or the whole errors array when called with no key
     */
    function errors(?string $key = null, mixed $default = ''): mixed
    {
        return app(Session::class)->errors($key, $default);
    }
}

if (! function_exists('verify_csrf')) {
    /**
     * Abort with a 419 if the request's _token doesn't match the session's CSRF token
     */
    function verify_csrf(): void
    {
        app(Session::class)->verifyCsrf();
    }
}

if (! function_exists('abort')) {
    /**
     * Halt the request and respond with the given HTTP status code and message
     */
    function abort(int $statusCode, string $message = ''): never
    {
        throw new HttpException($statusCode, $message);
    }
}

if (! function_exists('dump')) {
    /**
     * Dump one or more values without halting execution, returning the single value (or all values) back so it can be chained inline
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
