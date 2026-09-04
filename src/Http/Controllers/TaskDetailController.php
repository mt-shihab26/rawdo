<?php

namespace Src\Http\Controllers;

use Src\Core\Http\Request;
use Src\Core\Http\Response;

class TaskDetailController
{
    /**
     * Show the task detail page
     */
    public function index(Request $request): Response
    {
        return view('task-detail');
    }
}
