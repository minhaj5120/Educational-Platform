<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class AdminController extends Controller
{
    public function list(){
        $data['header_title'] = "Admin List";
        $data['getRecord']=User::getAdmin();
        return view("admin.admin.list", $data);
    }
    public function add(){
        $data['header_title'] = "Add New Admin";
        return view("admin.admin.add", $data);
    }
    public function insert(Request $request){
        

        $user = new User();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->number = trim($request->number);
        $user->password = Hash::make($request->password);
        $categoryValue = 1;
        $user->category = $categoryValue;
        $user->save();
        return redirect("admin/admin/list")->with("success","New Admin Added Successfully");
    }
    public function edit($id){
        
        $data['getRecord']=User::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit";
            return view("admin.admin.edit", $data);
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
        return redirect("admin/admin/list")->with("success","Admin Updateed Successfully");
    }
    public function delete($id){
        $user = User::getSingle($id);
        $user->is_deleted =1;
        $user->save();
        return redirect("admin/admin/list")->with("success","Admin Deleted Successfully");
    }
    public function search(Request $request)
    {
    $data['header_title'] = "Class List";
    $search = $request->input('search');

    $data['getRecord'] = User::where('name', 'like', '%' . $search . '%')->get();

    return view('admin/admin/list',$data);
    }
}
