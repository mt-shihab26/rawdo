<?php

namespace Src\Core\Http;

use Src\Core\Validation\Rule;
use Src\Core\Validation\Validator;

class Request
{
    /**
     * Create a request from its HTTP method, path, body data, and whether it arrived over HTTPS
     *
     * @param  array<string, mixed>  $data
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

    /**
     * Validate the request body against the given rules and return the sanitized, validated data, or throw a ValidationException if any rule fails
     *
     * @param  array<string, array<int, string|Rule>>  $rules
     * @param  array<string, string>  $messages
     * @return array<string, mixed>
     */
    public function validate(array $rules, array $messages = []): array
    {
        return Validator::make($this->data, $rules, $messages)->validate();
    }
}
