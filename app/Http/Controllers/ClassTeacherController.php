<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassTeacherModel;
use App\Models\User;
use App\Models\ClassModel;
use Auth;


class ClassTeacherController extends Controller
{
    public function list(){
        $data['header_title'] = "Assign Class Teacher List";
        $data['getRecord']=ClassTeacherModel::getRecord();
        return view("admin.assign_class_teacher.list", $data);
    }
    public function add(){
        $data["getClasses"] = ClassModel::getClasses();
        $data["getTeacher"] = User::getTeacher();

        $data['header_title'] = "Assign New Class Teacher";
        return view("admin.assign_class_teacher.add", $data);
    }
    public function insert(Request $request){
        
        if(!empty($request->classteacher_id)){

            foreach ($request->classteacher_id as $classteacher_id){
                $getAlreadyFirst=ClassTeacherModel::getAlreadyFirst($request->class_id,$classteacher_id);
                if(!empty($getAlreadyFirst)){
                    $getAlreadyFirst->status=$request->status;
                    $getAlreadyFirst->save();

                }
                else{
                    $save=new ClassTeacherModel();
                    $save->class_id = $request->class_name;
                    $save->teacher_id = $classteacher_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }

            }
            return redirect("admin/assign_class_teacher/list")->with("success","Subject Assigned Successfully");

        }
        else{
            return redirect("admin/assign_class_teacher/list")->with("error","Couldn't Add");
        }
    }
    public function edit($id){
        $data['getRecord'] = ClassTeacherModel::getSingle($id);
    
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit";
            $data["getClass"]=ClassModel::getClasses();
            $data["getTeacher"] = User::getTeacher();
            $data["getAssignTeacherId"]=ClassTeacherModel::getAssignTeacherId($data['getRecord']->class_id);
            return view("admin.assign_class_teacher.edit", $data);
        } else {
            abort(404);	
        }
    }
    
    public function update($id,Request $request){
        $classteacher = ClassTeacherModel::getSingle($id);
        $classteacher->name = trim($request->name);
        $classteacher->type = trim($request->type);
        $classteacher->status = $request->status == 'Active' ? 0 : 1;
        $classteacher->save();
        return redirect("admin/assign_class_teacher/list")->with("success","Subject Updateed Successfully");
    }
    public function delete($id){
        $classteacher = ClassTeacherModel::find($id);
    
        if (!$classteacher) {
            
            return redirect("admin/assign_class_teacher/list")->with("error","Subject not found");
        }
    
        $classteacher->delete(); 
    
        return redirect("admin/assign_class_teacher/list")->with("success","Subject Deleted Successfully");
    }
    
    public function search(Request $request)
    {
    $data['header_title'] = "Class Teacher List";
    $search = $request->input('search');

    
    $data['getRecord'] = ClassTeacherModel::where('name', 'like', '%' . $search . '%')->get();

    return view('admin/assign_class_teacher/list',$data);
    }

    //teacher_panel
    public function my_class_subject(){
        
        $data['header_title'] = "My Class And Subject";
        $data['getRecord']=ClassTeacherModel::getClassSubject(Auth::user()->id);
        return view("teacher.my_class_subject", $data);
    }
}
