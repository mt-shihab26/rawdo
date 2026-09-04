<?php

namespace Src\Core\Http;

use RuntimeException;

class HttpException extends RuntimeException
{
    /**
     * Create an exception carrying the HTTP status code and message abort() should respond with
     */
    public function __construct(
        public int $statusCode,
        string $message = '',
    ) {
        parent::__construct($message);
    }

    /**
     * Halt the request and respond with the given HTTP status code and message
     */
    public static function abort(int $statusCode, string $message = ''): never
    {
        throw new self($statusCode, $message);
    }
}
