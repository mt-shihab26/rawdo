<?php

use Src\Core\App;
use Src\Core\CoreServiceProvider;

$app = new App;

$app->container()->registerProviders([
    CoreServiceProvider::class,
    ...require __DIR__.'/../providers.php',
]);

require __DIR__.'/../routes.php';

return $app;
