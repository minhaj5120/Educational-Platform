<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class AdminTeacherController extends Controller
{
    public function list(){
        $data['header_title'] = "Teacher List";
        $data['getRecord']=User::getTeacher();
        return view("admin.teacher.list", $data);
    }
    public function add(){
        $data['header_title'] = "Add New Teacher";
        return view("admin.teacher.add", $data);
    }
    public function insert(Request $request){
        

        $user = new User();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->number = trim($request->number);
        $user->password = Hash::make($request->password);
        $categoryValue = 3;
        $user->category = $categoryValue;
        $user->save();
        return redirect("admin/teacher/list")->with("success","New Teacher Added Successfully");
    }
    public function edit($id){
        
        $data['getRecord']=User::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit";
            return view("admin.teacher.edit", $data);
        }
        else{
            abort(404);	
        }
        
    }
    public function update($id,Request $request){
        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->number = trim($request->number);
        $user->save();
        return redirect("admin/teacher/list")->with("success","Teacher Updateed Successfully");
    }
    public function delete($id){
        $teacher = User::find($id);
    
        if (!$teacher) {
            
            return redirect("admin/teacher/list")->with("error","Teacher not found");
        }
    
        $teacher->delete(); 
    
        return redirect("admin/teacher/list")->with("success","Teacher Deleted Successfully");
    }
    public function search(Request $request)
    {
    $data['header_title'] = "Teacher List";
    $search = $request->input('search');

    $data['getRecord'] = User::where('name', 'like', '%' . $search . '%')->get();

    return view('admin/teacher/list',$data);
    }
}
