<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function MyCalendar()
    {
        $data['header_title'] = "My Calender";
        return view("student.my_calendar", $data);
    }
}