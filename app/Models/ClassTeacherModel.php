<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassTeacherModel extends Model
{
    use HasFactory;
    protected $table = "class_teacher";
    static public function getRecord(){
        return self::select("class_teacher.*", 'class.name as class_name', 'teacher.name as teacher_name','users.name as created_by_name')
            ->join("users as teacher", "teacher.id", "=", "class_teacher.teacher_id")
            ->join("class", "class.id", "=", "class_teacher.class_id")
            ->join("users","users.id","=","class_teacher.created_by")
            ->where('class_teacher.is_deleted','=',0) // Filter by teacher category
            ->orderBy("class_teacher.id", "desc")
            ->get();
    

        // return self::select('subject.*','users.name as created_by_name')
        // ->join('users','users.id','subject.created_by')
        // // ->where('status', '=',0)
        // ->where('subject.is_deleted','=',0)
        // ->orderBy('id','desc')
        // ->get();
    }
    static public function getSingle($id){
        return self::find($id);
    }
    static public function getAssignTeacherId($class_id)
    {
        return self::where("class_id","=", $class_id)
        ->where("is_deleted","=",0) 
        ->get();
    }
    static public function getAlreadyFirst($class_id,$classteacher_id){
        return self::where("class_id","=",$class_id)
        ->where("teacher_id","=", $classteacher_id)->first();
    }

    static public function getClassSubjectCount($teacher_id){
        return self::select("class_teacher.id")
            ->join("class", "class.id", "=", "class_teacher.class_id")
            ->join("class_subject","class_subject.class_id","=", "class.id")
            ->join("subject","subject.id","=", "class_subject.subject_id")
            ->where("class_teacher.teacher_id","=", $teacher_id)
            ->where("class_teacher.status", "=", 0) 
            ->orderBy("class_teacher.id", "desc")
            ->count();
    }
    static public function getMyClassSubjectGroupCount($teacher_id){
        return ClassTeacherModel::select('class_teacher.id')
            ->join("class", "class.id", "=", "class_teacher.class_id")
            ->where("class_teacher.is_deleted", "=", 0) 
            ->where("class_teacher.status", "=", 0) 
            ->where("class_teacher.teacher_id","=", $teacher_id)
            ->count();
    }

    static public function getClassSubject($teacher_id){
        return self::select("class_teacher.*", 'class.name as class_name','subject.name as subject_name','subject.type as subject_type', 'class.id as class_id', 'subject.id as subject_id' )
            ->join("class", "class.id", "=", "class_teacher.class_id")
            ->join("class_subject","class_subject.class_id","=", "class.id")
            ->join("subject","subject.id","=", "class_subject.subject_id")
            ->where("class_teacher.teacher_id","=", $teacher_id)
            ->where("class_teacher.status", "=", 0) 
            ->orderBy("class_teacher.id", "desc")
            ->get();
    

    }

    static public function getClassSubjectGroup($teacher_id){
        return self::select("class_teacher.*", 'class.name as class_name', 'class.id as class_id' )
            ->join("class", "class.id", "=", "class_teacher.class_id")
            ->where("class_teacher.is_delete", "=", 0)
            ->where("class_teacher.status", "=", 0)
            ->where("class_teacher.teacher_id","=", $teacher_id)
            ->groupBy('class_teacher.class_id')
            ->orderBy("class_teacher.id", "desc")
            ->get();
    
    }

    static public function getCalendarTeacher($teacher_id)
    {
        return ClassTeacherModel::select('class_time.*','class.name as class_name','subject.name as subject_name','week.name as week_name','week.fullcalendar_day')
            ->join("class", "class.id", "=", "class_teacher.class_id")
            ->join("class_subject", "class_subject.class_id", "=", "class.id")
            ->join("class_time", "class_time.subject_id", "=", "class_subject.subject_id")
            ->join("subject", "subject.id", "=", "class_time.subject_id")
            ->join("week", "week.id", "=", "class_time.week_id")
            ->where('class_teacher.teacher_id','=',$teacher_id)
            ->where("class_teacher.status", "=", 0) 
            ->where("class_teacher.is_deleted", "=", 0) 
            ->get();
    }
    static public function getClassSubjectGroup($teacher_id){
        return self::select("class_teacher.*", "class.name as class_name", "class.id as class_id")
            ->join("class", "class.id", "=", "class_teacher.class_id")
            ->where("class_teacher.teacher_id","=", $teacher_id)
            ->where("class_teacher.status", "=", 0) 
            ->get();
    

    }

}
