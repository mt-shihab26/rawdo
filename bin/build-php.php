<?php

require __DIR__.'/../vendor/autoload.php';

use Src\Core\View;

$viewsDir = __DIR__.'/../src/Views';

$files = new RegexIterator(
    new RecursiveIteratorIterator(new RecursiveDirectoryIterator($viewsDir)),
    '/\.view\.php$/'
);

$view = new View;

foreach ($files as $file) {
    $name = substr($file->getPathname(), strlen($viewsDir) + 1, -strlen('.view.php'));

    $view->ensureCompiled($name);

    echo "Compiled {$name}\n";
}
