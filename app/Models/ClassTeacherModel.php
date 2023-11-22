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
    static public function getClassSubject($teacher_id){
        return self::select("class_teacher.*", 'class.name as class_name','subject.name as subject_name','subject.type as subject_type', 'class.id as class_id', 'subject.id as subject_id' )
            ->join("class", "class.id", "=", "class_teacher.class_id")
            ->join("class_subject","class_subject.class_id","=", "class.id")
            ->join("subject","subject.id","=", "class_subject.subject_id")
            ->where("class_teacher.teacher_id","=", $teacher_id)
            ->where("class_teacher.status", "=", 0) // Filter by teacher category
            ->orderBy("class_teacher.id", "desc")
            ->get();
    

        // return self::select('subject.*','users.name as created_by_name')
        // ->join('users','users.id','subject.created_by')
        // // ->where('status', '=',0)
        // ->where('subject.is_deleted','=',0)
        // ->orderBy('id','desc')
        // ->get();
    }
}
