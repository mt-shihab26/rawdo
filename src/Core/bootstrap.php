<?php

use Src\Core\App;
use Src\Core\Paths;

$app = new App;

$app->container()->registerProviders(require Paths::base('src/providers.php'));

require Paths::base('src/routes.php');

return $app;
