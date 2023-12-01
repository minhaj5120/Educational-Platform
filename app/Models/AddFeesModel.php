<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddFeesModel extends Model
{
    use HasFactory;
    protected $table = "add_fees";
    static public function getSingle($id){
        return self::find($id);
    }
    static public function getFees($student_id){
        return self::select('add_fees.*','class.name as class_name')
        ->join('class','class.id','=','add_fees.class_id')
        ->where('add_fees.student_id','=', $student_id)
        ->where('add_fees.is_paid','=', 1)
        ->get();
    }
    
    static public function getPaidAmount($student_id,$class_id){
        return self::where('add_fees.class_id','=', $class_id)
        ->where('add_fees.student_id','=', $student_id)
        ->where('add_fees.is_paid','=', 1)
        ->sum('add_fees.paid_amount');
    }
}
