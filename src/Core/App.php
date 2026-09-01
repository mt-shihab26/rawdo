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
            http_response_code(404);
            echo 'Not found';
        } else {
            $response = $route->call();

            echo $response->renderedString;
        }

        // Force data to be sent to the browser
        ob_flush();
        flush();

        // Terminate the request
        exit();
    }
}

Container::registerProviders([
    CoreServiceProvider::class,
    ...require __DIR__.'/../providers.php',
]);

require __DIR__.'/../routes.php';
