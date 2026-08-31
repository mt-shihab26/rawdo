<?php

use Src\Core\Response;

if (! function_exists('view')) {
    /**
     * Render view templates and return as Response object
     */
    function view(string $name, ?array $data = null): Response
    {
        return new Response;
    }
}
