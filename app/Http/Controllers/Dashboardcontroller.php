<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\User;
use App\Models\ClassModel;
use App\Models\SubjectModel;
use App\Models\ClassTeacherModel;
use App\Models\AddFeesModel;


class DashboardController extends Controller
{
    public function dashboard1()
    {
        $data['header_title'] = "Dashboard";
        if (Auth::check()) {
            $user = Auth::user();
    
            if ($user->category == 1) {
                $data['TotalAdmin'] = User::getTotalUser(1);    
                $data['TotalTeacher'] = User::getTotalUser(3);    
                $data['TotalStudent'] = User::getTotalUser(2);    
                $data['TotalClass'] = ClassModel::getTotalClass();    
                $data['TotalSubject'] = SubjectModel::getTotalSubject(); 
                $data['TotalPayment'] = AddFeesModel::getTotalPayment();



                return view('admin.dashboard',$data);
                }

            elseif ($user->category == 3) { 
                $data['TotalStudent'] = User::getTeacherStudentCount(Auth::user()->id);    
                $data['TotalClass'] = ClassTeacherModel::getMyClassSubjectGroupCount(Auth::user()->id);    
                $data['TotalSubject'] = ClassTeacherModel::getClassSubjectCount(Auth::user()->id);    


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

