<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SettingsModel;
use Auth;
use Hash;

class UserController extends Controller
{
    public function MyAccount(){
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        $data['header_title'] = "My Account";
        if(Auth::user()->category == 2)
        {
            return view("student.my_account", $data);
        }
        elseif(Auth::user()->category == 3)
        if(Auth::user()->catagory == 2)
        {
            return view("student.my_account", $data);
        }
        if(Auth::user()->catagory == 3)
        {
            return view("teacher.my_account", $data);
        }
    }
    public function UpdateMyAccount(Request $request){
        $id = Auth::user()->id;
        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        $user->number = trim($request->number);
        $user->date_of_birth = trim($request->date_of_birth);
        $user->blood_group = trim($request->blood_group);
        $user->height = trim($request->height);
        $user->weight = trim($request->weight);
        $user->email = trim($request->email);
        $user->number = trim($request->number);
        $user->save();
        return redirect()->back()->with('success',"Account Updateed Successfully");
    }
    
    
    public function change_password(){
        return view("profile.change_password");
    }
    public function update_change_password(Request $request){
        $user=User::getSingle(Auth::user()->id);

        if(Hash::check($request->old_password,$user->password)){
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect("admin/dashboard")->with("success","Password successfully updated");
        }
        else{
            return redirect()->back()->with("error","Password is not correct");
        }
        
    }
    public function settings(Request $request){
        $data['header_title'] = "Settings";
        return view("admin.settings", $data);
    }
    public function settings_insert(Request $request){
        $settings=new SettingsModel();
        $settings->stripe_key=trim($request->stripe_key);
        $settings->stripe_secret=trim($request->stripe_secret);
        $settings->save();
        return redirect("admin/dashboard")->with("success","Inserted Successfully");

    }

    
}
