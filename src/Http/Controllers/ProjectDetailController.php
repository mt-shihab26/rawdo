<?php

namespace Src\Http\Controllers;

use Src\Core\Http\Request;
use Src\Core\Http\Response;

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
