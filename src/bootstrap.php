<?php

use Src\Core\Container;
use Src\Core\CoreServiceProvider;

$container = new Container;

$container->registerProviders([
    CoreServiceProvider::class,
    ...require __DIR__.'/providers.php',
]);

require __DIR__.'/routes.php';
