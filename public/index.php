<?php

use Src\Core\App;
use Src\Core\Container;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../src/bootstrap.php';

$app = Container::current()->make(App::class);

dd($app);

$app->handle();
