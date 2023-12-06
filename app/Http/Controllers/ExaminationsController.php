<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ClassModel;
use App\Models\ExamModel;
use Auth;
use App\Models\ClassSubjectModel;
use App\Models\ExamScheduleModel;



use Auth;
use App\Models\ExamModel;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\ExamScheduleModel;
use App\Models\ClassTeacherModel;


class ExaminationsController extends Controller
{
    public function exam_list(){
        $data['header_title'] = "Exam List";
        $data['getRecord']=ExamModel::getRecord();
        return view("admin.examinations.exam.list", $data);
    } 

    public function exam_add(){
        $data['header_title'] = "Add New Exam";
        return view("admin.examinations.exam.add", $data);
    } 
    public function exam_insert(Request $request){
        $exam = new ExamModel;
        $exam->name = trim($request->name);
        $exam->note = trim($request->note);
        $exam->created_by = Auth::user()->id;
        $exam->save();
        return redirect('admin/examinations/exam/list')->with("success", "Exam successfully created");
    } 
    public function exam_edit($id)
    {
        $data['getRecord'] = ExamModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Exam";
            return view("admin.examinations.exam.edit", $data);
        }
        else{
            abort(404);
        }
    } 

    public function exam_update($id, Request $request){
        $exam = ExamModel::getSingle($id);
        $exam->name = trim($request->name);
        $exam->note = trim($request->note); 
        $exam->save();
        return redirect('admin/examinations/exam/list')->with("success", "Exam successfully updated");
    } 

    public function exam_delete($id){
        $getRecord = ExamModel::getSingle($id);
        if(!empty($getRecord))
        {
            $getRecord->is_delete = 1;
            $getRecord->save();
            return redirect()->back()->with("success", "Exam successfully deleted");
        }
        else{
            abort(404);
        }
    }


    public function exam_schedule(Request $request)
    {
        $data ['getClass'] = ClassModel::getClass();
        $data ['getExam'] = ExamModel::getExam();

        $result = array();


        $result = array();


        if(!empty($request->get('exam_id')) && !empty($request->get('class_id')))
        {
            $getSubject = ClassSubjectModel::Myclasssubject($request->get('class_id'));
            foreach($getSubject as $value)
            {
                $dataS = array();
                $dataS['subject_id'] = $value->subject_id;
                $dataS['class_id'] = $value->class_id;
                $dataS['subject_name'] = $value->subject_name;
                $dataS['subject_type'] = $value->subject_type;
                $ExamSchedule = ExamScheduleModel::getRecordSingle($request->get('exam_id'), $request->get('class_id'), $value->subject_id);

                if(!empty($ExamSchedule))
                {
                    $dataS['exam_date'] = $ExamSchedule->exam_date;
                    $dataS['start_time'] = $ExamSchedule->start_time;
                    $dataS['end_time'] = $ExamSchedule->end_time;
                    $dataS['room_number'] = $ExamSchedule->room_number;
                    $dataS['full_marks'] = $ExamSchedule->full_marks;
                    $dataS['passing_marks'] = $ExamSchedule->passing_marks;
                }
                else
                {
                    $dataS['exam_date'] = '';
                    $dataS['start_time'] = '';
                    $dataS['end_time'] = '';
                    $dataS['room_number'] = '';
                    $dataS['full_marks'] = '';
                    $dataS['passing_marks'] = '';
                }

                $result[] = $dataS;
            }
        }

        $data['getRecord'] = $result;


        $data['getRecord'] = $result;

        $data['header_title'] = "Exam Schedule";
        return view("admin.examinations.exam_schedule", $data);
    }

    public function exam_schedule_insert(Request $request)
    {

        if(!empty($request->schedule))
        {
            ExamScheduleModel::deleteRecord($request->exam_id, $request->class_id);
            foreach($request->schedule as $schedule)
            {
                if(!empty($schedule['subject_id']) && $schedule['exam_date'] && $schedule['start_time'] && $schedule['end_time'] && $schedule['room_number'] && $schedule['full_marks'] && $schedule['passing_marks'])
                {
                    $exam = new ExamScheduleModel;
                    $exam->exam_id = $request->exam_id;
                    $exam->class_id = $request->class_id;
                    $exam->subject_id = $schedule['subject_id'];
                    $exam->exam_date = $schedule['exam_date'];
                    $exam->start_time = $schedule['start_time'];
                    $exam->end_time = $schedule['end_time'];
                    $exam->room_number = $schedule['room_number'];
                    $exam->full_marks = $schedule['full_marks'];
                    $exam->passing_marks = $schedule['passing_marks'];
                    $exam->created_by = Auth::user()->id;
                    $exam->save();
                }

            }
        }
        return redirect()->back()->with("success", "Exam Schedule successfully saved");
    }

    //student side

    public function MyExamTimetable(Request $request)
    {
        $class_id = Auth::user()->class_id;
        $getExam = ExamScheduleModel::getExam($class_id);
        $result = array();
        foreach($getExam as $value)
        {
            $dataE = array();
            $dataE['name'] = $value->exam_name;
            $getExamTimetable = ExamScheduleModel::getExamTimetable($value->exam_id, $class_id);
            $resultS = array();
            foreach($getExamTimetable as $valueS)
            {
                $dataS = array();
                $dataS['subject_name'] = $valueS->subject_name;
                $dataS['exam_date'] = $valueS->exam_date;
                $dataS['start_time'] = $valueS->start_time;
                $dataS['end_time'] = $valueS->end_time;
                $dataS['room_number'] = $valueS->room_number;
                $dataS['full_marks'] = $valueS->full_marks;
                $dataS['passing_marks'] = $valueS->passing_marks;
                $resultS[] = $dataS;
            }

            $dataE['exam'] = $resultS;
            $result[] = $dataE;
        }

        $data['getRecord'] = $result;

        $data['header_title'] = "My Exam Timetable";
        return view("student.my_exam_timetable", $data);
    }

    //teacher side

    public function MyExamTimetableTeacher(Request $request)
    {
        $result = array();
        $getClass = ClassTeacherModel::getClassSubject(Auth::user()->id);
        foreach($getClass as $class)
        {
            $dataC = array();
            $dataC['class_name'] = $class->class_name;
            $getExam = ExamScheduleModel::getExam($class->class_id);
            $examArray = array();
            foreach($getExam as $exam)
            {
                $dataE = array();
                $dataE['exam_name'] = $exam->exam_name;
                $getExamTimetable = ExamScheduleModel::getExamTimetable($exam->exam_id, $class->class_id);
                $subjectArray = array();
                foreach($getExamTimetable as $valueS)
                {
                    $dataS = array();
                    $dataS['subject_name'] = $valueS->subject_name;
                    $dataS['exam_date'] = $valueS->exam_date;
                    $dataS['start_time'] = $valueS->start_time;
                    $dataS['end_time'] = $valueS->end_time;
                    $dataS['room_number'] = $valueS->room_number;
                    $dataS['full_marks'] = $valueS->full_marks;
                    $dataS['passing_marks'] = $valueS->passing_marks;
                    $subjectArray[] = $dataS;
                }
                $dataE['subject'] = $subjectArray;
                $examArray[] = $dataE;
            }
            $dataC['exam'] = $examArray;
            $result[] = $dataC;

        }
        $data['getRecord'] = $result;
        $data['header_title'] = "My Exam Timetable";
        
        return view("teacher.my_exam_timetable", $data);
    }

}
