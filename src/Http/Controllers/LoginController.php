<?php

namespace Src\Http\Controllers;

use Src\Core\Request;
use Src\Core\Response;

class LoginController
{
    /**
     * Show the login page
     */
    public function index(Request $request): Response
    {
        return view('login');
    }
}
