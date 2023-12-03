<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use App\Models\ClassTimeModel;
use App\Models\WeekModel;
use Auth;

class CalendarController extends Controller
{
    public function MyCalendar()
    {
        $getRecoed=ClassSubjectModel::Myclasssubject(Auth::user()->class_id);
        $result=array();
        foreach($getRecoed as $value){
            $dataS['subject_name']= $value->subject_name;

            $getWeek=WeekModel::getRecord();
            $week=array();
            foreach($getWeek as $valueW){
                $dataW=array();
                $dataW['week_name']= $valueW->name;
                $dataW['fullcalendar_day']= $valueW->fullcalendar_day;
                $classsubject=ClassTimeModel::getRecordClassTime( $value->class_id, $value->subject_id,$valueW->id);
                if(!empty($classsubject)){
                    $dataW['start_time']= $classsubject->start_time;
                    $dataW['end_time']= $classsubject->end_time;
                    $dataW['room_number']= $classsubject->room_number;
                    $week[]=$dataW;
                }
            }
            $dataS['week']=$week;
            $result[]=$dataS;
        }
        //dd($result);
        $data['getMyTimetable'] = $result;
        $data['header_title'] = "My Calender";
        return view("student.my_calendar", $data);
    }
}
