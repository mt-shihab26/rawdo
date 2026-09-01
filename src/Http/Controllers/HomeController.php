<?php

namespace Src\Http\Controllers;

use Src\Core\Request;

class HomeController
{
    public function index(Request $request)
    {
        return view('home');
    }
}
