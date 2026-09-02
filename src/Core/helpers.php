<?php

use Src\Core\App;
use Src\Core\HttpException;
use Src\Core\Request;
use Src\Core\Response;
use Src\Core\RouteHelper;
use Src\Core\Session;
use Src\Core\View;
use Symfony\Component\VarDumper\VarDumper;

if (! function_exists('view')) {
    /**
     * Render a page view and return it as a Response object
     */
    function view(string $name, ?array $data = null): Response
    {
        $renderedString = App::get(View::class)->renderPage($name, $data ?? []);

        return new Response(renderedString: $renderedString, statusCode: 200);
    }
}

if (! function_exists('route')) {
    /**
     * Resolve a named route to its path, or get the RouteHelper when called with no name
     */
    function route(?string $name = null): string|RouteHelper
    {
        if ($name === null) {
            return new RouteHelper;
        }

        $route = App::matchRouteByName($name);

        if (! $route) {
            throw new RuntimeException("Route [{$name}] not found.");
        }

        return $route->getPath();
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
        return App::make(Session::class)->token();
    }
}

if (! function_exists('csrf_field')) {
    /**
     * Build the hidden input field carrying the CSRF token, for use inside a <form>
     */
    function csrf_field(): string
    {
        return '<input type="hidden" name="_token" value="'.htmlspecialchars(csrf_token(), ENT_QUOTES).'">';
    }
}

if (! function_exists('old')) {
    /**
     * Get a value flashed as old input on the previous request's validation failure,
     * or the whole old-input array when called with no key
     *
     * Reads (and clears) the session only once per request, no matter how many times
     * this is called, so e.g. old('name') then old('email') both see the same data.
     */
    function old(?string $key = null, mixed $default = ''): mixed
    {
        static $old = null;

        $old ??= App::make(Session::class)->pull('old', []);

        return $key === null ? $old : ($old[$key] ?? $default);
    }
}

if (! function_exists('errors')) {
    /**
     * Get a validation error flashed on the previous request's failed submission,
     * or the whole errors array when called with no key
     *
     * Reads (and clears) the session only once per request, no matter how many times
     * this is called, so multiple errors('field') calls on one page all see the data.
     */
    function errors(?string $key = null, mixed $default = ''): mixed
    {
        static $errors = null;

        $errors ??= App::make(Session::class)->pull('errors', []);

        return $key === null ? $errors : ($errors[$key] ?? $default);
    }
}

if (! function_exists('verify_csrf')) {
    /**
     * Abort with a 419 if the request's _token doesn't match the session's CSRF token
     */
    function verify_csrf(Request $request): void
    {
        if (! hash_equals(csrf_token(), (string) $request->input('_token', ''))) {
            abort(419, 'Page expired. Please refresh and try again.');
        }
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
