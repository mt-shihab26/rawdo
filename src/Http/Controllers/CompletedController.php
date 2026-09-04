<?php

namespace Src\Http\Controllers;

use Src\Core\Http\Request;
use Src\Core\Http\Response;

class CompletedController
{
    /**
     * Show the completed tasks page
     */
    public function index(Request $request): Response
    {
        return view('completed');
    }
}
