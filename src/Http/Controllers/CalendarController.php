<?php

namespace Src\Http\Controllers;

use Src\Core\Http\Request;
use Src\Core\Http\Response;

class CalendarController
{
    /**
     * Show the calendar page
     */
    public function index(Request $request): Response
    {
        return view('calendar');
    }
}
