<?php

namespace Src\Http\Controllers;

use Src\Core\Http\Request;
use Src\Core\Http\Response;

class HomeController
{
    /**
     * Show the home page
     */
    public function index(Request $request): Response
    {
        return view('home');
    }
}
