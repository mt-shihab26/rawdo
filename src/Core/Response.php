<?php

namespace Src\Core;

class Response
{
    /**
     * Create a response wrapping the rendered output, or a redirect when $redirectTo is set
     */
    public function __construct(
        public string $renderedString = '',
        public int $statusCode = 200,
        public ?string $redirectTo = null,
    ) {
        //
    }

    /**
     * Build a redirect response to the given URL
     */
    public static function redirect(string $url, int $statusCode = 302): self
    {
        return new self(statusCode: $statusCode, redirectTo: $url);
    }
}
