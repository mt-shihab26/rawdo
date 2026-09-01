<?php

namespace Src\Http\Controllers;

use Src\Core\Request;
use Src\Core\Response;

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
