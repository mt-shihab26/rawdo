<?php

use Src\Core\App;

// Let the built-in dev server serve static files directly instead of
// routing them through the app
if (PHP_SAPI === 'cli-server') {
    $file = __DIR__.parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    if (is_file($file)) {
        return false;
    }
}

require __DIR__.'/../vendor/autoload.php';

$app = new App;

$app->handle();
