<?php

namespace Src\Http\Controllers;

use Src\Core\Request;
use Src\Core\Response;

class HomeController
{
    /**
     * Show the home page
     */
    public function index(Request $request): Response
    {
        abort(403);

        return view('home');
    }
}
