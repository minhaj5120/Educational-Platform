<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function registerUser(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:8",
            "number" => "required|numeric",
            "category" => "required|in:admin,student,teacher", // Validate the category selection
        ]);
    
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->number = $request->number;
        
        // Map the category selection to a value and save it
        $category = $request->category;
        $categoryValue = 1; // Default to 1 (admin)
        
        if ($category === 'student') {
            $categoryValue = 2;
        } elseif ($category === 'teacher') {
            $categoryValue = 3;
        }
        
        $user->category = $categoryValue; // Store the category value in the database
        
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
            $user = Auth::user(); // Get the authenticated user
            

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
        // Attempt to authenticate the user using the provided email and password.
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:8",
        ]);
    
        $user = User::where('email', '=', $request->email)->first();
    
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                // Authenticate the user
                Auth::login($user);
                
    
                // Now, you can access the authenticated user using Auth::user()
                $authenticatedUser = Auth::user();
                
    
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
        return redirect()->route('login');
    }
}
