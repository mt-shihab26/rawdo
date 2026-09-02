<?php

use Src\Core\App;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../src/bootstrap.php';

$app = app(App::class);

$app->handle();
