<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use Auth;
use App\Models\SubjectModel;
use App\Models\ClassModel;

class ClassSubjectController extends Controller
{
    public function list(){
        $data['header_title'] = "Assign Subject List";
        $data['getRecord']=ClassSubjectModel::getclasssubject();
        return view("admin.assign_subject.list", $data);
    }
    public function add(){
        $data["getClasses"] = ClassModel::getClasses();
        $data["getSubjects"] = SubjectModel::getSubjects();

        $data['header_title'] = "Assign New Subject";
        return view("admin.assign_subject.add", $data);
    }
    public function insert(Request $request){
        
        if(!empty($request->subject_id)){
            foreach ($request->subject_id as $value){
                $save=new ClassSubjectModel();
                $save->subject_id = $value;
                $save->class_id = $request->class_id;
                $save->status = $request->status;
                $save->created_by = Auth::user()->id;
                $save->save();
            }
            return redirect("admin/assign_subject/list")->with("success","Subject Assigned Successfully");

        }
        else{
            return redirect("admin/assign_subject/list")->with("error","Couldn't Add");
        }
    }
    public function edit($id){
        
        $data['getRecord']=ClassSubjectModel::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit";
            return view("admin.assign_subject.edit", $data);
        }
        else{
            abort(404);	
        }
        
    }
    public function update($id,Request $request){
        $subject = ClassSubjectModel::getSingle($id);
        $subject->name = trim($request->name);
        $subject->type = trim($request->type);
        $subject->status = $request->status == 'Active' ? 0 : 1;
        $subject->save();
        return redirect("admin/assign_subject/list")->with("success","Subject Updateed Successfully");
    }
    public function delete($id){
        $subject = ClassSubjectModel::find($id);
    
        if (!$subject) {
            
            return redirect("admin/sassign_ubject/list")->with("error","Subject not found");
        }
    
        $subject->delete(); 
    
        return redirect("admin/assign_subject/list")->with("success","Subject Deleted Successfully");
    }
    
    public function search(Request $request)
    {
    $data['header_title'] = "Subject List";
    $search = $request->input('search');

    
    $data['getRecord'] = ClassSubjectModel::where('type', 'like', '%' . $search . '%')->get();

    return view('admin/assign_subject/list',$data);
    }
}
