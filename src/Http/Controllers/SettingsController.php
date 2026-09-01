<?php

namespace Src\Http\Controllers;

use Src\Core\Request;
use Src\Core\Response;

class SettingsController
{
    /**
     * Show the settings page
     */
    public function index(Request $request): Response
    {
        return view('settings');
    }
}
