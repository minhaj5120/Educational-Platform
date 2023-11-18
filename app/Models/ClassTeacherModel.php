<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassTeacherModel extends Model
{
    use HasFactory;
    protected $table = "class_teacher";
    static public function getclassteacher(){
        return self::select("class_teacher.*", 'class.name as class_name', 'users.name as teacher_name', 'users.name as created_by_name')
            ->join("users", "users.id", "=", "class_teacher.teacher_id")
            ->join("class", "class.id", "=", "class_teacher.class_id")
            ->where("users.category", "=", 3) // Filter by teacher category
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
}
