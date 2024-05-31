<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAttendanceModel extends Model
{
    use HasFactory;
    protected $table = "student_attendance";
    
    static public function checkAttendance($student_id,$class_id,$date){
        return self::where('student_id','=',$student_id)
        ->where('class_id','=',$class_id)
        ->where('date','=',$date)->first();

    }


    
    static public function getRecord(){
        $return = self::select('student_attendance.*','class.name as class_name','student.name as student_name','student.last_name as student_last_name')
            ->join('class','class.id','=','student_attendance.class_id')
            ->join("users as student","student.id","=","student_attendance.student_id");
            if (!empty(request()->get('class_id'))) {
                $return->where('student_attendance.class_id', '=', request()->get('class_id'));
            }
            if (!empty(request()->get('attendance_date'))) {
                $return->where('student_attendance.date', '=', request()->get('attendance_date'));
            }
            if (!empty(request()->get('attendance_type'))) {
                $return->where('student_attendance.type', '=', request()->get('attendance_type'));
            }
        $return = $return->orderBy('student_attendance.id','asc')
            ->paginate(50);
        return $return;



    }
    static public function getRecordTeacher($class_id){
      if(!empty($class_id)){
        $return = self::select('student_attendance.*','class.name as class_name','student.name as student_name','student.last_name as student_last_name')
            ->join('class','class.id','=','student_attendance.class_id')
            ->join("users as student","student.id","=","student_attendance.student_id")
            ->where('student_attendance.class_id','=',$class_id);
            if (!empty(request()->get('class_id'))) {
                $return->where('student_attendance.class_id', '=', request()->get('class_id'));
            }
            if (!empty(request()->get('attendance_date'))) {
                $return->where('student_attendance.date', '=', request()->get('attendance_date'));
            }
            if (!empty(request()->get('attendance_type'))) {
                $return->where('student_attendance.type', '=', request()->get('attendance_type'));
            }
        $return = $return->orderBy('student_attendance.id','asc')
            ->paginate(50);
        return $return;
      }
      else{
        return '';
      }


    }
    static public function getRecordStudent($student_id){
          $return = self::select('student_attendance.*','class.name as class_name')
              ->join('class','class.id','=','student_attendance.class_id')
              ->where('student_attendance.student_id','=',$student_id);
          $return = $return->orderBy('student_attendance.id','asc')
              ->paginate(50);
          return $return;
  
  
      }
    static public function getRecordStudentCount($student_id){
        return self::where('student_id', $student_id)
                   ->count();
    }


    


    
}
