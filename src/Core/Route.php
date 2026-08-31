<?php

namespace Src\Core;

class Route
{
    public static function get(string $path, $callback): self
    {
        return new self;
    }

    public function name(string $route)
    {
        return new self;
    }
}
