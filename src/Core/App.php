<?php

namespace Src\Core;

require __DIR__.'/../routes.php';

class App
{
    /**
     * Match the current request to a route and send back its response
     */
    public function handle()
    {
        $request = Request::capture();

        $route = Route::matchByRequest($request);

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
