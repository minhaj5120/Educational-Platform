<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\User;
class DashboardController extends Controller
{
    public function dashboard1()
    {
        $data['header_title'] = "Dashboard";
        if (Auth::check()) {
            $user = Auth::user();
    
            if ($user->category == 1) { // Change variable name to $users
                    return view('admin.dashboard',$data); // Pass $users to the view
                }
            elseif ($user->category == 3) { // Change variable name to $users
                    return view('teacher.dashboard',$data); // Pass $users to the view
                }
            elseif ($user->category == 2) { // Change variable name to $users
                    return view('student.dashboard',$data); // Pass $users to the view
                }
    
        return view('Auth.login');
        }
    }
    public function logout()
    {
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}

