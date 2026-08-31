<?php

namespace Src\Core;

class Response
{
    public function __construct(
        public string $renderedString,
    ) {}
}
