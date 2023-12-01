<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\SubjectModel;
use App\Models\ClassSubjectModel;
use App\Models\WeekModel;
use App\Models\ClassTimeModel;
use Auth;
class ClassTimeController extends Controller
{
    public function list(Request $request){
        $data["getClasses"] = ClassModel::getClasses();
        $data["getSubject"] = [];
        if(!empty($request->class_id)){
            $data["getSubject"] = ClassSubjectModel::Myclasssubject($request->class_id);
        }

        $getWeek=WeekModel::getRecord();
        $week=array();
        foreach($getWeek as $value){
            $dataW=array(); 
            $dataW['week_id']= $value->id;
            $dataW['week_name']= $value->name;
            
            if(!empty($request->class_id) && !empty($request->subject_id)){
                $classsubject=ClassTimeModel::getRecordClassTime( $request->class_id, $request->subject_id,$value->id);
                if(!empty($classsubject)){
                    $dataW['start_time']= $classsubject->start_time;
                    $dataW['end_time']= $classsubject->end_time;
                    $dataW['room_number']= $classsubject->room_number;
                }
                else{
                    $dataW['start_time']= "";
                    $dataW['end_time']="";
                    $dataW['room_number']= "";
                }
            }
            else{
                $dataW['start_time']= "";
                $dataW['end_time']="";
                $dataW['room_number']="";
            }
            $week[] = $dataW;
        }
        $data['week'] = $week;

        $data['header_title'] = "Assign Subject List";
        return view("admin.class_time.list", $data);
    }
    public function get_subject(Request $request)
    {
        $class_id = $request->class_id;
    
        $getSubject = ClassSubjectModel::Myclasssubject($class_id);
        
        $options = "<option value=''>Select</option>";
        
        foreach ($getSubject as $value) {
            $options .= "<option value='".$value->subject_id."'>".$value->subject_name."</option>";
        }
    
        return response()->json(['html' => $options]);
    }
    public function insert_update(Request $request){
        ClassTimeModel::where('class_id','=',$request->class_id)->where('subject_id','=',$request->subject_id)->delete();
        foreach ($request->timetable as $timetable){
            if(!empty($timetable['week_id']) && !empty($timetable['start_time']) && !empty($timetable['end_time']) && !empty($timetable['room_number'])){
                $save= new ClassTimeModel;
                $save->class_id = $request->class_id;
                $save->subject_id = $request->subject_id;
                $save->week_id = $timetable['week_id'];
                $save->start_time = $timetable['start_time'];
                $save->end_time = $timetable['end_time'];
                $save->room_number = $timetable['room_number'];
                $save->save();

            }
               

        }
        return redirect("admin/class_time/list")->with("success","Class Time successfully Set");
    }
    public function teacher_class_time($class_id,$subject_id){

            $data["getClass"] = ClassModel::getSingle($class_id) ;
            $data["getSubject"] = SubjectModel::getSingle($subject_id);


            $getWeek=WeekModel::getRecord();
            $week=array();
            foreach( $getWeek as $valueW){
                $dataW=array(); 
                $dataW['week_name']= $valueW->name;
                $getClassTime=ClassTimeModel::getRecordClassTime($class_id,$subject_id,$valueW->id);
                if(!empty($getClassTime)){
                    $dataW['start_time']= $getClassTime->start_time;
                    $dataW['end_time']= $getClassTime->end_time;
                    $dataW['room_number']= $getClassTime->room_number;
                }
                else{
                    $dataW['start_time']= "";
                    $dataW['end_time']="";
                    $dataW['room_number']="";
                }
                $result[]=$dataW;
            }
        $data["getRecord"]=$result;

        $data['header_title'] = "Class Time";
        return view("teacher.class_time",$data);

    }
    public function MyTimetable()
    {
        $getWeek=WeekModel::getRecord();
        $week=array();
        foreach($getWeek as $value){
            $dataW=array(); 
            $dataW['week_id']= $value->id;
            $dataW['week_name']= $value->name;
            
            if(!empty($request->class_id) && !empty($request->subject_id)){
                $classsubject=ClassTimeModel::getRecordClassTime( $request->class_id, $request->subject_id,$value->id);
                if(!empty($classsubject)){
                    $dataW['start_time']= $classsubject->start_time;
                    $dataW['end_time']= $classsubject->end_time;
                    $dataW['room_number']= $classsubject->room_number;
                }
                else{
                    $dataW['start_time']= "";
                    $dataW['end_time']="";
                    $dataW['room_number']= "";
                }
            }
            else{
                $dataW['start_time']= "";
                $dataW['end_time']="";
                $dataW['room_number']="";
            }
            $week[] = $dataW;
        }
        $data['week'] = $week;
        $data['getRecord'] = ClassSubjectModel::Myclasssubject(Auth::user()->class_id);
        $data['header_title'] = "My Timetable";
        return view("student.student.my_timetable", $data); 
    }
}
