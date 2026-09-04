<?php

namespace Src\Core\Routing;

use Closure;

class RouteGroup
{
    /**
     * Hold the prefix to apply to every route registered inside group()
     */
    public function __construct(
        private string $prefix
    ) {
        //
    }

    /**
     * Run the callback with this group's prefix applied to every route it registers
     */
    public function group(Closure $callback): void
    {
        Route::withPrefix($this->prefix, $callback);
    }
}
