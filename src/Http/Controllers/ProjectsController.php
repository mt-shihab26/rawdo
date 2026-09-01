<?php

namespace Src\Http\Controllers;

use Src\Core\Request;
use Src\Core\Response;

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
