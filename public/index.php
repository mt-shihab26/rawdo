<?php

use Src\Core\App;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../src/bootstrap.php';

$app = new App;

$app->handle();
