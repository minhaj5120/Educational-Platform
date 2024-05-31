<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\ExamModel;
use Auth;
use App\Models\ClassSubjectModel;
use App\Models\ExamScheduleModel;
use App\Models\User;
use App\Models\MarksRegisterModel;
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

    public function mark_register(Request $request)
    {
        $data ['getClass'] = ClassModel::getClass();
        $data ['getExam'] = ExamModel::getExam();
        if(!empty($request->get('exam_id')) && !empty($request->get('class_id')))
        {
            $data['getSubject'] = ExamScheduleModel::getSubject($request->get('exam_id'),$request->get('class_id'));
            $data['getStudent']= User::getStudentClass($request->get('class_id'));
        }
        $data['header_title'] = "Mark Register";
        return view("admin.examinations.mark_register", $data);
    }

    public function mark_register_save(Request $request)
    {
        if (!empty($request->marks)) {
            foreach ($request->marks as $mark) {
                $attendance = !empty($mark['attendance_marks']) ? $mark['attendance_marks'] : 0;
                $assignment = !empty($mark['assignment_marks']) ? $mark['assignment_marks'] : 0;
                $midterm = !empty($mark['mid_marks']) ? $mark['mid_marks'] : 0;
                $final = !empty($mark['final_marks']) ? $mark['final_marks'] : 0;
    
                $getMarks = MarksRegisterModel::check_marks($request->student_id, $request->exam_id, $request->class_id, $mark['subject_id']);
                if (!empty($getMarks)) {
                    $save = $getMarks;
                } else {
                    $save = new MarksRegisterModel;
                    $save->created_by = Auth::user()->id;
                }
                $save->exam_id = $request->exam_id;
                $save->class_id = $request->class_id;
                $save->student_id = $request->student_id;
                $save->subject_id = $mark['subject_id'];
                $save->attendance = $attendance;
                $save->assignment = $assignment;
                $save->midterm = $midterm;
                $save->final = $final;
    
                $save->save();
            }
        }

        return response()->json(['success' => true, 'message' => 'Marks Successfully Registered']);
    }
    public function teacher_mark_register_save(Request $request)
    {
        if (!empty($request->marks)) {
            foreach ($request->marks as $mark) {
                $attendance = !empty($mark['attendance_marks']) ? $mark['attendance_marks'] : 0;
                $assignment = !empty($mark['assignment_marks']) ? $mark['assignment_marks'] : 0;
                $midterm = !empty($mark['mid_marks']) ? $mark['mid_marks'] : 0;
                $final = !empty($mark['final_marks']) ? $mark['final_marks'] : 0;
    
                $getMarks = MarksRegisterModel::check_marks($request->student_id, $request->exam_id, $request->class_id, $mark['subject_id']);
                if (!empty($getMarks)) {
                    $save = $getMarks;
                } else {
                    $save = new MarksRegisterModel;
                    $save->created_by = Auth::user()->id;
                }
                $save->exam_id = $request->exam_id;
                $save->class_id = $request->class_id;
                $save->student_id = $request->student_id;
                $save->subject_id = $mark['subject_id'];
                $save->attendance = $attendance;
                $save->assignment = $assignment;
                $save->midterm = $midterm;
                $save->final = $final;
    
                $save->save();
            }
        }

        return response()->json(['success' => true, 'message' => 'Marks Successfully Registered']);
    }

    public function teacher_mark_register(Request $request)
    {
        $data ['getClass'] = ClassTeacherModel::getClassSubjectGroup(Auth::user()->id);
        $data ['getExam'] = ExamScheduleModel::getExamTeacher(Auth::user()->id);
        if(!empty($request->get('exam_id')) && !empty($request->get('class_id')))
        {
            $data['getSubject'] = ExamScheduleModel::getSubject($request->get('exam_id'),$request->get('class_id'));
            $data['getStudent']= User::getStudentClass($request->get('class_id'));
        }
        $data['header_title'] = "Mark Register";
        return view("teacher.mark_register", $data);
    }
    public function my_exam_result()
    {
        $result = array();
        $getExam = MarksRegisterModel::getExam(Auth::user()->id);
        foreach($getExam as $value)
        {
            $dataC = array();
            $dataE['exam_name'] = $value->exam_name;
            $getExamSubject = MarksRegisterModel::getExamSubject($value->exam_id, Auth::user()->id);

            $dataSubject = array();
            foreach($getExamSubject as $exam)
            {
                $dataS = array();
                $dataS['subject_name'] = $exam['subject_name'];
                $dataS['attendance'] = $exam['attendance'];
                $dataS['assignment'] = $exam['assignment'];
                $dataS['midterm'] = $exam['midterm'];
                $dataS['final'] = $exam['final'];
                $dataS['full_marks'] = $exam['full_marks'];
                $dataS['passing_mark'] = $exam['passing_mark'];
                $dataSubject[] = $dataS;
            }
            $dataE['subject'] = $dataSubject;
            $result[] = $dataE;
            
        }
        $data['getRecord']=$result;
        $data['header_title'] = "My Exam Result";
    
        return view("student.my_exam_result", $data);
    }


    
}
