<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\User;
use App\Models\StudentAttendanceModel;
use App\Models\ClassTeacherModel;
use Auth;


class AttendanceController extends Controller
{
    public function student_attendance(Request $request){
        $data['header_title'] = "Student Attendance";
        $data['getClass']=ClassModel::getClass();
        if(!empty($request->class_id) && !empty($request->get('attendance_date')))
        {
            $data['getStudent']=User::getStudentClass($request->get('class_id'));
        }
        return view("admin.attendance.student", $data);
    }
    public function student_attendance_insert(Request $request){
        $check_attendance=StudentAttendanceModel::checkAttendance($request->student_id,$request->class_id,$request->date);
        if(!empty($check_attendance))
        {
            $attendance=$check_attendance;
        }
        else
        {
            $attendance=new StudentAttendanceModel();
            $attendance->student_id = $request->student_id;
            $attendance->class_id = $request->class_id;
            
            $attendance->date = $request->date;
            $attendance->created_by = Auth::user()->id;
        }
        $attendance->type=$request->type;
        $attendance->save();

        $json['success']='Attendance Successfully Saved';
        echo json_encode($json);

    }
    public function student_attendance_report(Request $request){
        $data['header_title'] = "Student Attendance Report";
        $data['getClass']=ClassModel::getClass();
        $data['getRecord']=StudentAttendanceModel::getRecord();
        return view("admin.attendance.report", $data);
    }

    //teacher_side
    public function teacher_student_attendance(Request $request){
        $data['header_title'] = "Student Attendance";
        $data['getClass']=ClassTeacherModel::getClassSubjectGroup(Auth::user()->id);
        if(!empty($request->class_id) && !empty($request->get('attendance_date')))
        {
            $data['getStudent']=User::getStudentClass($request->get('class_id'));
        }
        return view("teacher.attendance.student", $data);
    }
    public function teacher_student_attendance_report(Request $request){
        $data['header_title'] = "Student Attendance Report";
        $getClass=ClassTeacherModel::getClassSubjectGroup(Auth::user()->id);
        $class=array();
        foreach($getClass as $value)
        {
            $class[]=$value->class_id;
        }
        $data['getClass']=$getClass;
        $data['getRecord']=StudentAttendanceModel::getRecordTeacher($class);
        return view("teacher.attendance.report", $data);
    }

    //student_side
    
    public function my_attendance(){
        $data['header_title'] = "My Attendance";
        $data['getRecord']=StudentAttendanceModel::getRecordStudent(Auth::user()->id);
        return view("student.my_attendance", $data);
    }


    

    

    
    
}
