<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ClassModel;
use Hash;
use Auth;
use Str;

class AdminStudentController extends Controller
{
    public function list(){
        $data['header_title'] = "Student List";
        $data['getRecord']=User::getStudent();
        return view("admin.student.list", $data);
    }
    public function add(){
        $data["classes"] = ClassModel::getClassStudent();
        $data['header_title'] = "Add New Student";
        return view("admin.student.add", $data);
    }
    public function insert(Request $request){
        $user = new User();
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->number = trim($request->number);
        $user->admission_number = trim($request->admission_number);
        $user->roll_number = trim($request->roll_number);
        $user->class_id = trim($request->class_id);
        $user->gender = trim($request->gender);
    
        if (!empty($request->file('profile_pic'))) {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr =date('Ymdhis'). Str::random(30);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $filename);
            $user->profile_pic = $filename;
        }
    
        $user->religion = trim($request->religion);
        $user->admission_date = trim($request->admission_date);
    
        if (!empty($request->date_of_birth)) {
            $user->date_of_birth = trim($request->date_of_birth);
        }
    
        $user->blood_group = trim($request->blood_group);
        $user->height = trim($request->height);
        $user->weight = trim($request->weight);
        $categoryValue = 2;
        $user->category = $categoryValue;
        $user->save();
    
        return redirect("admin/student/list")->with("success", "New Student Added Successfully");
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

    //teacher side
    public function my_student(){
        $data['header_title'] = "Student List";
        $data['getRecord']=User::getTeacherStudent(Auth::user()->id);
        return view("teacher.my_student", $data);
    }
}
