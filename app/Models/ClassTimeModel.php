<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassTimeModel extends Model
{
    use HasFactory;
    protected $table = "class_time";
    static public function getRecordClassTime($class_id,$subject_id,$week_id){
        return self::where('class_id','=',$class_id)
        ->where('subject_id','=',$subject_id)
        ->where('week_id','=',$week_id)->first();

    }
}
