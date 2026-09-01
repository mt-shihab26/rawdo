<?php

namespace Src\Core;

class App
{
    use RegistersRoutes;

    /**
     * Match the current request to a route and send back its response
     */
    public function handle()
    {
        $request = Request::capture();

        Container::instance(Request::class, $request);

        $route = self::matchRouteByRequest($request);

        $response = $route ? $route->call() : new Response('Not found', 404);

        $this->handleResponse($response);

        // Force data to be sent to the browser
        ob_flush();
        flush();

        // Terminate the request
        exit();
    }

    /**
     * Send a response to the browser, rendering the pages/404 view for any 404 response if one exists
     */
    private function handleResponse(Response $response)
    {
        $response = $this->resolve404Response($response);

        http_response_code($response->statusCode);

        echo $response->renderedString;
    }

    /**
     * Swap a 404 response's body for the pages/404 view, if one is defined
     */
    private function resolve404Response(Response $response): Response
    {
        if ($response->statusCode === 404 && Container::get(View::class)->exists('pages/404')) {
            $response = view('404');
            $response->statusCode = 404;
        }

        return $response;
    }
}

Container::registerProviders([
    CoreServiceProvider::class,
    ...require __DIR__.'/../providers.php',
]);

require __DIR__.'/../routes.php';
