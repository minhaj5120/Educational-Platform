<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassTeacherModel; 

use Auth;
class TeacherCalendarController extends Controller

{
    public function MyCalendarTeacher()
    {
        $teacher_id =Auth::user()->id;
        $data['getClassTimetable'] = ClassTeacherModel :: getCalendarTeacher($teacher_id);
        $data['header_title'] = "My Calender";
        return view("teacher.my_calendar", $data);
    }
}
