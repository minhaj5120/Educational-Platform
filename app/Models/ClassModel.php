<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;
    protected $table = "class";
    static public function getclass(){
        return self::select('class.*','users.name as created_by_name')
        ->join('users','users.id','class.created_by')
        // ->where('status', '=',0)
        // ->where('is_deleted','=',0)
        ->orderBy('id','desc')
        ->get();
    }
    static public function getSingle($id){
        return self::find($id);
    }
}
