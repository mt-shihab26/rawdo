<?php

use Src\Core\App;
use Src\Core\CoreServiceProvider;

App::registerProviders([
    CoreServiceProvider::class,
    ...require __DIR__.'/providers.php',
]);

require __DIR__.'/routes.php';
