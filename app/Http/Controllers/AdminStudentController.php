<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class AdminStudentController extends Controller
{
    public function list(){
        $data['header_title'] = "Student List";
        $data['getRecord']=User::getStudent();
        return view("admin.student.list", $data);
    }
    public function add(){
        $data['header_title'] = "Add New student";
        return view("admin.student.add", $data);
    }
    public function insert(Request $request){
        

        $user = new User();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->number = trim($request->number);
        $user->password = Hash::make($request->password);
        $categoryValue = 2;
        $user->category = $categoryValue;
        $user->save();
        return redirect("admin/student/list")->with("success","New Student Added Successfully");
    }
    public function edit($id){
        
        $data['getRecord']=User::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit";
            return view("admin.student.edit", $data);
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
        return redirect("admin/student/list")->with("success","Student Updateed Successfully");
    }
    public function delete($id){
        $teacher = User::find($id);
    
        if (!$teacher) {
            return redirect("admin/student/list")->with("error","Student not found");
        }
    
        $teacher->delete();
    
        return redirect("admin/student/list")->with("success","Student deleted Successfully");
    }
    public function search(Request $request)
    {
    $data['header_title'] = "Student List";
    $search = $request->input('search');

    $data['getRecord'] = User::where('name', 'like', '%' . $search . '%')->get();

    return view('admin/student/list',$data);
    }
}
