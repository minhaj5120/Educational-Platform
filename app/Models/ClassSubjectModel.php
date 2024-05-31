<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSubjectModel extends Model
{
    use HasFactory;
    protected $table = "class_subject";
    static public function getclasssubject(){
        return self::select("class_subject.*",'class.name as class_name','subject.name as subject_name','users.name as created_by_name')
                    ->join("subject","subject.id","=","class_subject.subject_id")
                    ->join("class","class.id","=","class_subject.class_id")
                    ->join("users","users.id","=","class_subject.created_by")
                    ->orderBy("class_subject.id","desc")
                    ->get();    

        // return self::select('subject.*','users.name as created_by_name')
        // ->join('users','users.id','subject.created_by')
        // // ->where('status', '=',0)
        // ->where('subject.is_deleted','=',0)
        // ->orderBy('id','desc')
        // ->get();
    }
    static public function Myclasssubject($class_id){
        return self::select("class_subject.*",'class.name as class_name','subject.name as subject_name','users.name as created_by_name')
                    ->join("subject","subject.id","=","class_subject.subject_id")
                    ->join("class","class.id","=","class_subject.class_id")
                    ->join("users","users.id","=","class_subject.created_by")
                    ->where("class_subject.class_id","=","$class_id")
                    ->where("class_subject.status","=", 0)
                    ->orderBy("class_subject.id","desc")
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
    static public function MySubject($class_id){
        return self::select("class_subject.*",'class.name as class_name','subject.name as subject_name','subject.type as type')
                    ->join("subject","subject.id","=","class_subject.subject_id")
                    ->join("class","class.id","=","class_subject.class_id")
                    ->where("class_subject.status","=", 0)
                    ->where("class_subject.class_id","=", $class_id)
                    ->orderBy("class_subject.id","desc")
                    ->get();    

    }
    static public function MySubjectTotal($class_id){
        return self::select("class_subject.id")
                    ->join("subject","subject.id","=","class_subject.subject_id")
                    ->join("class","class.id","=","class_subject.class_id")
                    ->where("class_subject.status","=", 0)
                    ->where("class_subject.class_id","=", $class_id)
                    ->orderBy("class_subject.id","desc")
                    ->count();    

    }
}
