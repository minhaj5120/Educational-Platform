<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;
    protected $table = "class";
    
    static public function getClass(){
        return self::select('class.*','users.name as created_by_name')
        ->join('users','users.id','class.created_by')
        // ->where('status', '=',0)
        ->where('class.is_deleted','=',0)
        ->orderBy('id','desc')
        ->get();
    }
    static public function getSingle($id){
        return self::find($id);
    }
    static public function getClasses(){
        return self::select('class.*')
        ->join('users','users.id','class.created_by')
        ->where('class.status', '=',0)
        ->where('class.is_deleted','=',0)
        
        ->orderBy('class.id','asc')
        ->get();
    }
    public static function getClassStudent()
    {
        return self::select('class.*')
        ->where('class.status', '=',0)
        ->where('class.is_deleted','=',0)
        ->orderBy('class.id','asc')
        ->get();
    }
    static public function getTotalClass(){
        $return = ClassModel::select('class.id')
            ->where('class.status', '=',0)
            ->where('class.is_deleted','=',0)
            ->count();
        return $return;
    }

}
