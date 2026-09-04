<?php

namespace Src\Core\Http;

class Request
{
    /**
     * Create a request from its HTTP method, path, body data, and whether it arrived over HTTPS
     */
    public function __construct(
        public string $method,
        public string $path,
        public array $data = [],
        public bool $secure = false,
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
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
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
