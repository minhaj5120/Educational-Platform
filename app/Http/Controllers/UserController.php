<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class UserController extends Controller
{
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
}
