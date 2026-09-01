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
        if (! $route) {
            $this->handleNotFound();
        } else {
            $response = $route->call();
            $this->handleResponse($response);
        }
        // Force data to be sent to the browser
        ob_flush();
        flush();
        // Terminate the request
        exit();
    }

    /**
     * Send a 404 response for a request with no matching route
     */
    public function handleNotFound()
    {
        http_response_code(404);
        echo 'Not found';
    }

    /**
     * Send a matched route's response to the browser
     */
    public function handleResponse(Response $response)
    {
        echo $response->renderedString;
    }
}

Container::registerProviders([
    CoreServiceProvider::class,
    ...require __DIR__.'/../providers.php',
]);

require __DIR__.'/../routes.php';
