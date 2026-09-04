<?php

use Src\Core\App;

$app = new App;

$app->container()->registerProviders(require __DIR__.'/../providers.php');

require __DIR__.'/../routes.php';

return $app;
