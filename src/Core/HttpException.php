<?php

namespace Src\Core;

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
}
