<?php

class App
{
    public function handle()
    {
        echo 'Data received.';

        // Force data to be sent to the browser
        ob_flush();
        flush();

        // Terminate the request
        exit();
    }
}

$app = new App;

return $app;
