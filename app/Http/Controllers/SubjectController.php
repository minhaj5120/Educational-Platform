<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubjectModel;
use App\Models\ClassSubjectModel;
use Auth;

class SubjectController extends Controller
{
    public function list(){
        $data['header_title'] = "Subject List";
        $data['getRecord']=SubjectModel::getsubject();
        return view("admin.subject.list", $data);
    }
    public function add(){
        $data['header_title'] = "Add New Subject";
        return view("admin.subject.add", $data);
    }
    public function insert(Request $request){
        

        $subject = new SubjectModel ();
        $subject->name = trim($request->name);
        $subject->type = trim($request->type);
        $subject->status = trim($request->status);
        $subject->created_by = Auth::user()->id;
        $subject->save();
        return redirect("admin/subject/list")->with("success","Class Added Successfully");
    }
    public function edit($id){
        
        $data['getRecord']=SubjectModel::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit";
            return view("admin.subject.edit", $data);
        }
        else{
            abort(404);	
        }
        
    }
    public function update($id,Request $request){
        $subject = SubjectModel::getSingle($id);
        $subject->name = trim($request->name);
        $subject->type = trim($request->type);
        $subject->status = $request->status == 'Active' ? 0 : 1;
        $subject->save();
        return redirect("admin/subject/list")->with("success","Subject Updateed Successfully");
    }
    public function delete($id){
        $subject = SubjectModel::find($id);
    
        if (!$subject) {
            
            return redirect("admin/subject/list")->with("error","Subject not found");
        }
    
        $subject->delete(); 
    
        return redirect("admin/subject/list")->with("success","Subject Deleted Successfully");
    }
    
   public function my_subject()
   {
       $data['getRecord'] = ClassSubjectModel::MySubject(Auth::user()->class_id);
       $data['header_title'] = "My Subject";
       return view('student.my_subject',$data);
   }


    public function search(Request $request)
    {
    $data['header_title'] = "Subject List";
    $search = $request->input('search');

    
    $data['getRecord'] = SubjectModel::where('type', 'like', '%' . $search . '%')->get();

    return view('admin/subject/list',$data);
    }
}
