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
    
            if ($user->category == 1) {
                    return view('admin.dashboard',$data);
                }
            elseif ($user->category == 3) { 
                    return view('teacher.dashboard',$data); 
                }
            elseif ($user->category == 2) { 
                    return view('student.dashboard',$data); 
                }
    
        return view('Auth.login');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

