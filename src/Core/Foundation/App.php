<?php

namespace Src\Core\Foundation;

use Src\Core\Database\Database;
use Src\Core\Http\HttpException;
use Src\Core\Http\ReasonPhrases;
use Src\Core\Http\Request;
use Src\Core\Http\Response;
use Src\Core\Http\Session;
use Src\Core\Routing\Route;
use Src\Core\Routing\RouteRegistry;
use Src\Core\Validation\ValidationException;
use Src\Core\View\View;
use Throwable;

class App
{
    private static self $current;

    private Container $container;

    /**
     * Create the app, building the container it resolves everything through
     */
    public function __construct()
    {
        $this->container = new Container;

        $this->container->singleton(RouteRegistry::class, fn () => new RouteRegistry);
        $this->container->singleton(View::class, fn () => new View);
        $this->container->singleton(Database::class, fn () => new Database);

        self::$current = $this;
    }

    /**
     * Get the container, or resolve a class through it when given one
     */
    public static function get(?string $class = null): mixed
    {
        $container = self::$current->container();

        return $class === null ? $container : $container->make($class);
    }

    /**
     * Get the container this app resolves everything through
     */
    public function container(): Container
    {
        return $this->container;
    }

    /**
     * Match the current request to a route and send back its response
     */
    public function handle(): never
    {
        $request = Request::capture();
        $container = $this->container;

        $container->instance(Request::class, $request);
        $container->singleton(Session::class, fn () => new Session($request));

        /** @var Route|null $route */
        $route = $container->make(RouteRegistry::class)->matchRequest($request);
        if ($route) {
            $container->instance(Route::class, $route);
        }

        try {
            if ($route && $request->method !== 'GET') {
                $container->make(Session::class)->verifyCsrf();
            }

            $response = $route ? $route->call() : new Response('Not found', 404);
        } catch (ValidationException $e) {
            $container->make(Session::class)->put('errors', $e->errors);
            $container->make(Session::class)->put('old', $e->old);
            $response = Response::redirect($request->path);
        } catch (HttpException $e) {
            $response = new Response($e->getMessage(), $e->statusCode);
        } catch (Throwable $e) {
            $response = new Response($e->getMessage(), 500);
        }

        $this->handleResponse($response);

        ob_flush();
        flush();

        exit();
    }

    /**
     * Send a response to the browser, rendering a matching pages/{status} view for any error response if one exists
     */
    private function handleResponse(Response $response): void
    {
        if ($response->redirectTo !== null) {
            http_response_code($response->statusCode);
            header("Location: {$response->redirectTo}");

            return;
        }

        $response = $this->resolveStatusPageResponse($response);

        http_response_code($response->statusCode);

        echo $response->renderedString;
    }

    /**
     * Swap an error response's body for its pages/{status} view if one is defined, otherwise fall back to "{status} {reason phrase}" text
     */
    private function resolveStatusPageResponse(Response $response): Response
    {
        $statusCode = $response->statusCode;

        if ($statusCode < 400) {
            return $response;
        }

        if ($this->container->get(View::class)->pageExists("{$statusCode}")) {
            $response = $this->container->get(View::class)->page((string) $statusCode);
            $response->statusCode = $statusCode;
        } elseif ($response->renderedString === '') {
            $response->renderedString = (new ReasonPhrases)->text($statusCode);
        }

        return $response;
    }
}
