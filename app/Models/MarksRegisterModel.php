<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarksRegisterModel extends Model
{
    use HasFactory;
    protected $table = "marks_register";

    static public function check_marks($student_id,$exam_id,$class_id,$subject_id){
        return self::where('student_id','=',$student_id)
        ->where('exam_id','=',$exam_id)
        ->where('class_id','=',$class_id)
        ->where('subject_id','=',$subject_id)
        ->first();

    }
    static public function getExamResult($student_id, $class_id)
    {
        return self::select('marks_register.exam_id', 'exam.name as exam_name')
            ->join('exam', 'exam.id', '=', 'marks_register.exam_id')
            ->join('class', 'class.id', '=', 'marks_register.class_id')
            ->where('marks_register.student_id', '=', $student_id)
            ->where('marks_register.class_id', '=', $class_id)
            ->groupBy('marks_register.exam_id', 'exam.name')
            ->orderBy('marks_register.id','asc')
            ->get();
    }

    static public function getExamSubject($exam_id,$student_id){
        return self::select('marks_register.*','exam.name as exam_name','subject.name as subject_name')
            ->join('exam','exam.id','=','marks_register.exam_id')
            ->join('subject','subject.id','=','marks_register.subject_id')
            ->where('marks_register.exam_id','=',$exam_id)
            ->where('marks_register.student_id','=',$student_id)
            ->get();

    }
    static public function getExam($student_id){
        return self::select('marks_register.*','exam.name as exam_name')
            ->join('exam','exam.id','=','marks_register.exam_id')
            ->where('marks_register.student_id','=',$student_id)
            ->distinct()
            ->get();

    }
    


    

}
