<?php

namespace Src\Http\Controllers;

use Src\Core\Request;
use Src\Core\Response;

class SignupController
{
    /**
     * Show the signup page
     */
    public function index(Request $request): Response
    {
        return view('signup');
    }
}
