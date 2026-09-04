<?php

namespace Src\Core;

class Paths
{
    /**
     * Absolute path to the project root, resolved once from this file's own fixed location
     *
     * @var string
     */
    private const ROOT = __DIR__.'/../..';

    /**
     * Resolve a path relative to the project root
     */
    public static function base(?string $path = null): string
    {
        return $path ? self::ROOT.'/'.$path : self::ROOT;
    }

    /**
     * Resolve a path relative to the src/Views directory, where .view.php templates live
     */
    public static function view(?string $path = null): string
    {
        return self::base($path ? "src/Views/$path" : 'src/Views');
    }

    /**
     * Resolve a path relative to the storage directory
     */
    public static function storage(?string $path = null): string
    {
        return self::base($path ? "storage/$path" : 'storage');
    }

    /**
     * Resolve a path relative to the config directory
     */
    public static function config(?string $path = null): string
    {
        return self::base($path ? "config/$path" : 'config');
    }
}
