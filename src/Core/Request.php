<?php

namespace Src\Core;

class Request
{
    /**
     * Create a request from its HTTP method and path
     */
    public function __construct(
        public string $method,
        public string $path,
    ) {
        $this->method = strtoupper($this->method);
    }

    /**
     * Build a request from the current PHP superglobals
     */
    public static function capture(): self
    {
        return new self(
            $_SERVER['REQUEST_METHOD'],
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
        );
    }
}
