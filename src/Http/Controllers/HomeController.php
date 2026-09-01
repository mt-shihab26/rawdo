<?php

namespace Src\Http\Controllers;

use Src\Core\Request;

class HomeController
{
    /**
     * Show the home page
     */
    public function index(Request $request)
    {
        return view('home');
    }
}
