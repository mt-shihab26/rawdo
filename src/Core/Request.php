<?php

namespace Src\Core;

class Request
{
    /**
     * Create a request from its HTTP method, path, and body data
     */
    public function __construct(
        public string $method,
        public string $path,
        public array $data = [],
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
            $_POST,
        );
    }

    /**
     * Get a value from the request body, or $default if it's missing
     */
    public function input(string $key, mixed $default = null): mixed
    {
        return $this->data[$key] ?? $default;
    }
}
