<?php

use Src\Core\Response;
use Src\Core\View;

if (! function_exists('view')) {
    /**
     * Render view templates and return as Response object
     */
    function view(string $name, ?array $data = null): Response
    {
        $renderedString = (new View)->render($name, $data);

        return new Response($renderedString);
    }
}
