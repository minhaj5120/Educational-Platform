<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{
    use HasFactory;
    protected $table = "subject";
    static public function getsubject(){
        return self::select('subject.*','users.name as created_by_name')
        ->join('users','users.id','subject.created_by')
        // ->where('status', '=',0)
        ->where('subject.is_deleted','=',0)
        ->orderBy('id','desc')
        ->get();
    }
    static public function getSingle($id){
        return self::find($id);
    }
    static public function getSubjects(){
        return self::select('subject.*')
        // ->join('users','users.id','class.created_by')
        ->where('subject.status', '=',0)
        ->where('subject.is_deleted','=',0)
        
        ->orderBy('subject.name','asc')
        ->get();
    }
    static public function getTotalSubject()
    {
        $return = SubjectModel::select('subject.id')
            ->where('subject.status', '=',0)
            ->where('subject.is_deleted','=',0)
            ->count();
        return $return;

    }
}
