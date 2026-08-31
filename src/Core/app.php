<?php

use Src\Core\Route;

require __DIR__.'/../routes.php';

class App
{
    /**
     * Match the current request to a route and send back its response
     */
    public function handle()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $route = Route::matchByRequest($method, $path);

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

$app = new App;

return $app;
