<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function homepage()
    {
        return view('Auth.homepage');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|",
            "number" => "required|numeric",
            "category" => "required|in:student,teacher",
        ]);
    
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->number = $request->number;
        
        $category = $request->category;
        $categoryValue = 1;
        
        if ($category === 'student') {
            $categoryValue = 2;
        } elseif ($category === 'teacher') {
            $categoryValue = 3;
        }
        
        $user->category = $categoryValue;
        
        $result = $user->save();
        
        if ($result) {
            return back()->with('success', 'Your registration was successful');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }    
    public function registration()
    {
        return view('Auth.registration');
    }
    public function login()
    {
        if (Auth::check()) {
            $user = Auth::user();
            

            if ($user->category == 1) {
                return view('admin.dashboard');
            } elseif ($user->category == 2) {
                return view('student.dashboard');
            } elseif ($user->category == 3) {
                return view('teacher.dashboard');
            }
        }
    
        return view('Auth.login');
    }

    public function Authlogin(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:8",
        ]);
    
        $user = User::where('email', '=', $request->email)->first();
    
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                
    
                
                $authenticatedUser = Auth::user();
                
                $user->last_login = now();
                $user->save();
                
                if ($user->category == 1) {
                    return redirect()->route('admin.dashboard');
                } elseif ($user->category == 2) {
                    return redirect()->route('student.dashboard');
                } elseif ($user->category == 3) {
                    return redirect()->route('teacher.dashboard');
                }
            } else {
                return back()->with('fail', 'Incorrect Password');
            }
        } else {
            return back()->with('fail', 'Incorrect Email');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('homepage');
    }
}
