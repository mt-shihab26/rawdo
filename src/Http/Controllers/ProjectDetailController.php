<?php

namespace Src\Http\Controllers;

use Src\Core\Request;
use Src\Core\Response;

class ProjectDetailController
{
    /**
     * Show the project detail page
     */
    public function index(Request $request): Response
    {
        return view('project-detail');
    }
}
