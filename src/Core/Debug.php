<?php

namespace Src\Core;

use Symfony\Component\VarDumper\VarDumper;

class Debug
{
    /**
     * Dump one or more values without halting execution, returning the single value (or all values) back so it can be chained inline
     */
    public static function dump(mixed ...$values): mixed
    {
        foreach ($values as $value) {
            VarDumper::dump($value);
        }

        return count($values) === 1 ? $values[0] : $values;
    }

    /**
     * Dump one or more values and halt execution
     */
    public static function dd(mixed ...$values): never
    {
        self::dump(...$values);

        exit(1);
    }
}
