<?php

namespace Src\Http\Controllers;

use Src\Core\Request;
use Src\Core\Response;

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
