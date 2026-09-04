<?php

namespace Src\Http\Controllers;

use Src\Core\Http\Request;
use Src\Core\Http\Response;

class ProjectsController
{
    /**
     * Show the projects page
     */
    public function index(Request $request): Response
    {
        return view('projects');
    }
}
