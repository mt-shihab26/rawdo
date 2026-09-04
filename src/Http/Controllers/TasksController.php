<?php

namespace Src\Http\Controllers;

use Src\Core\Http\Request;
use Src\Core\Http\Response;

class TasksController
{
    /**
     * Show the all-tasks page
     */
    public function index(Request $request): Response
    {
        return view('tasks');
    }
}
