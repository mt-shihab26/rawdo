<?php

namespace Src\Core;

use Throwable;

class App
{
    use HasReasonPhrases;

    /**
     * Create the app with the container it resolves everything through
     */
    public function __construct(
        private Container $container,
    ) {
        //
    }

    /**
     * Match the current request to a route and send back its response
     */
    public function handle()
    {
        $request = Request::capture();

        $this->container->instance(Request::class, $request);
        $this->container->singleton(Session::class, fn () => new Session($request));

        $route = $this->container->make(RouteRegistry::class)->matchRequest($request);
        if ($route) {
            $this->container->instance(Route::class, $route);
        }

        try {
            $response = $route ? $route->call() : new Response('Not found', 404);
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
    private function handleResponse(Response $response)
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
     * Swap an error response's body for its pages/{status} view (e.g. pages/404, pages/500), if one is
     * defined; otherwise fall back to "{status} {reason phrase}" text when the response has no body of its own
     */
    private function resolveStatusPageResponse(Response $response): Response
    {
        $statusCode = $response->statusCode;

        if ($statusCode < 400) {
            return $response;
        }

        if ($this->container->get(View::class)->exists(View::PAGES_DIRECTORY."/{$statusCode}")) {
            $response = view((string) $statusCode);
            $response->statusCode = $statusCode;
        } elseif ($response->renderedString === '') {
            $response->renderedString = $this->getStatusText($statusCode);
        }

        return $response;
    }
}
