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
        if (Auth::check()) {
            $user = Auth::user();
    
            if ($user->category == 1) {
                if (Session::has('loginId')) {
                    $userData = User::find(Session::get('loginId')); // Change variable name to $users
                    return view('admin.dashboard', compact('userData')); // Pass $users to the view
                }
            } elseif ($user->category == 2) {
                if (Session::has('loginId')) {
                    $userData = User::find(Session::get('loginId')); // Change variable name to $users
                    return view('teacher.dashboard', compact('userData')); // Pass $users to the view
                }
            } elseif ($user->category == 3) {
                if (Session::has('loginId')) {
                    $userData = User::find(Session::get('loginId')); // Change variable name to $users
                    return view('student.dashboard', compact('userData')); // Pass $users to the view
                }
            }
        }
    
        return view('Auth.login');
    }
    public function logout()
    {
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}

