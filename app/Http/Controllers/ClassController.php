<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use Auth;

class ClassController extends Controller
{
    public function list(){
        $data['header_title'] = "Class List";
        $data['getRecord']=ClassModel::getClass();
        return view("admin.class.list", $data);
    }
    public function add(){
        $data['header_title'] = "Add New Class";
        return view("admin.class.add", $data);
    }
    public function insert(Request $request){
        

        $class = new ClassModel();
        $class->name = trim($request->name);
        $class->status = trim($request->status);
        $class->created_by = Auth::user()->id;
        $class->save();
        return redirect("admin/class/list")->with("success","Class Added Successfully");
    }
    public function search(Request $request)
    {
    $data['header_title'] = "Class List";
    $search = $request->input('search');

    // Add your search logic here, for example, use the Eloquent query to filter records based on the name.
    $data['getRecord'] = ClassModel::where('name', 'like', '%' . $search . '%')->get();

    return view('admin/class/list',$data);
    }
    public function edit($id){
        
        $data['getRecord']=ClassModel::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit";
            return view("admin.class.edit", $data);
        }
        else{
            abort(404);	
        }
        
    }
    public function update($id,Request $request){
        $user = ClassModel::getSingle($id);
        $user->name = trim($request->name);
        $user->status = $request->status == 'Active' ? 0 : 1;
        $user->save();
        return redirect("admin/class/list")->with("success","Class Updateed Successfully");
    }
    public function delete($id){
        $class = ClassModel::find($id);
    
        if (!$class) {
            // Handle the case where the record with the given ID is not found.
            return redirect("admin/class/list")->with("error","Class not found");
        }
    
        $class->delete(); // This will delete the record from the database.
    
        return redirect("admin/class/list")->with("success","Class Deleted Successfully");
    }
}
