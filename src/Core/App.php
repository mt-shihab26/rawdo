<?php

namespace Src\Core;

use Throwable;

class App
{
    use HasReasonPhrases, RegistersRoutes;

    /**
     * Match the current request to a route and send back its response
     */
    public function handle()
    {
        $request = Request::capture();

        Container::instance(Request::class, $request);

        $route = self::matchRouteByRequest($request);

        try {
            $response = $route ? $route->call() : new Response('Not found', 404);
        } catch (HttpException $e) {
            $response = new Response($e->getMessage(), $e->statusCode);
        } catch (Throwable $e) {
            $response = new Response($e->getMessage(), 500);
        }

        $this->handleResponse($response);

        // Force data to be sent to the browser
        ob_flush();
        flush();

        // Terminate the request
        exit();
    }

    /**
     * Send a response to the browser, rendering a matching pages/{status} view for any error response if one exists
     */
    private function handleResponse(Response $response)
    {
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

        if (Container::get(View::class)->exists("pages/{$statusCode}")) {
            $response = view((string) $statusCode);
            $response->statusCode = $statusCode;
        } elseif ($response->renderedString === '') {
            $response->renderedString = $this->getStatusText($statusCode);
        }

        return $response;
    }
}

Container::registerProviders([
    CoreServiceProvider::class,
    ...require __DIR__.'/../providers.php',
]);

require __DIR__.'/../routes.php';
