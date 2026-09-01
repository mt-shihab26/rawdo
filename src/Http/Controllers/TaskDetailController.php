<?php

namespace Src\Http\Controllers;

use Src\Core\Request;
use Src\Core\Response;

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
