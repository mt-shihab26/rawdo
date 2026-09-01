<?php

namespace Src\Core;

class Response
{
    /**
     * Create a response wrapping the rendered output
     */
    public function __construct(
        public string $renderedString = '',
        public int $statusCode = 200,
    ) {
        //
    }
}
