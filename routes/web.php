<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\AdminTeacherController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\ClassTeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassTimeController;
use App\Http\Controllers\FeesCollectionController;
use App\Http\Controllers\ExaminationsController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\TeacherCalendarController;
use App\Http\Controllers\AttendanceController;







//use Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/homepage', [AuthController::class, 'homepage'])->name('homepage');
Route::get('homepage/login', [AuthController::class, 'homepagelogin'])->name('homepagelogin');
Route::get('homepage/registration', [AuthController::class, 'homepageregistration'])->name('homepageregistration');
Route::get('/login', [AuthController::class, 'login'])->name('login');

// Route::get('/login', [AuthController::class, 'login']); // This is for displaying the login form
Route::post('/Authlogin', [AuthController::class, 'Authlogin'])->name('Authlogin'); // This is for handling the form submission
Route::get('/registration', [AuthController::class, 'registration']);
Route::post('/registerUser', [AuthController::class, 'registerUser'])->name('registerUser');
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'Admin'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard1'])->name('admin.dashboard');
    Route::get('admin/admin/dashboard', [DashboardController::class, 'dashboard1']);
    //admin
    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'insert']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);
    Route::get('admin/admin/search', [AdminController::class, 'search']);

    //teacher
    Route::get('admin/teacher/list', [AdminTeacherController::class, 'list']);
    Route::get('admin/teacher/add', [AdminTeacherController::class, 'add']);
    Route::post('admin/teacher/add', [AdminTeacherController::class, 'insert']);
    Route::get('admin/teacher/edit/{id}', [AdminTeacherController::class, 'edit']);
    Route::post('admin/teacher/edit/{id}', [AdminTeacherController::class, 'update']);
    Route::get('admin/teacher/delete/{id}', [AdminTeacherController::class, 'delete']);
    Route::get('admin/teacher/search', [AdminTeacherController::class, 'search']);

    //student
    Route::get('admin/student/list', [AdminStudentController::class, 'list']);
    Route::get('admin/student/add', [AdminStudentController::class, 'add']);
    Route::post('admin/student/add', [AdminStudentController::class, 'insert']);
    Route::get('admin/student/edit/{id}', [AdminStudentController::class, 'edit']);
    Route::post('admin/student/edit/{id}', [AdminStudentController::class, 'update']);
    Route::get('admin/student/delete/{id}', [AdminStudentController::class, 'delete']);
    Route::get('admin/student/search', [AdminStudentController::class, 'search']);
    

    //class
    Route::get('admin/class/list', [ClassController::class, 'list']);
    Route::get('admin/class/add', [ClassController::class, 'add']);
    Route::post('admin/class/add', [ClassController::class, 'insert']);
    Route::get('admin/class/edit/{id}', [ClassController::class, 'edit']);
    Route::post('admin/class/edit/{id}', [ClassController::class, 'update']);
    Route::get('admin/class/delete/{id}', [ClassController::class, 'delete']);
    Route::get('admin/class/search', [ClassController::class, 'search']);
    


    //subject
    Route::get('admin/subject/list', [SubjectController::class, 'list']);
    Route::get('admin/subject/add', [SubjectController::class, 'add']);
    Route::post('admin/subject/add', [SubjectController::class, 'insert']);
    Route::get('admin/subject/edit/{id}', [SubjectController::class, 'edit']);
    Route::post('admin/subject/edit/{id}', [SubjectController::class, 'update']);
    Route::get('admin/subject/delete/{id}', [SubjectController::class, 'delete']);
    Route::get('admin/subject/search', [SubjectController::class, 'search']);

    //assign_subject
    Route::get('admin/assign_subject/list', [ClassSubjectController::class, 'list']);
    Route::get('admin/assign_subject/add', [ClassSubjectController::class, 'add']);
    Route::post('admin/assign_subject/add', [ClassSubjectController::class, 'insert']);
    Route::get('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'edit']);
    Route::post('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'update']);
    Route::get('admin/assign_subject/delete/{id}', [ClassSubjectController::class, 'delete']);
    Route::get('admin/assign_subject/search', [ClassSubjectController::class, 'search']);

    //assign_class_teacher
    Route::get('admin/assign_class_teacher/list', [ClassTeacherController::class, 'list']);
    Route::get('admin/assign_class_teacher/add', [ClassTeacherController::class, 'add']);
    Route::post('admin/assign_class_teacher/add', [ClassTeacherController::class, 'insert']);
    Route::get('admin/assign_class_teacher/edit/{id}', [ClassTeacherController::class, 'edit']);
    Route::post('admin/assign_class_teacher/edit/{id}', [ClassTeacherController::class, 'update']);
    Route::get('admin/assign_class_teacher/delete/{id}', [ClassTeacherController::class, 'delete']);
    Route::get('admin/assign_class_teacher/search', [ClassTeacherController::class, 'search']);

    //class_time
    Route::get('admin/class_time/list', [ClassTimeController::class, 'list']);
    Route::post('admin/class_time/get_subject', [ClassTimeController::class, 'get_subject']);
    Route::post('admin/class_time/add', [ClassTimeController::class, 'insert_update']);

    //fees_collection
    Route::get('admin/fees_collection/collect_fees', [FeesCollectionController::class, 'collect_fees']);
    Route::get('admin/fees_collection/add_fees/{student_id}', [FeesCollectionController::class, 'add_fees']);
    Route::post('admin/fees_collection/add_fees/{student_id}', [FeesCollectionController::class, 'add_fees_insert']);

    //exam
    Route::get('admin/examinations/exam/list', [ExaminationsController::class, 'exam_list']);
    Route::get('admin/examinations/exam/add', [ExaminationsController::class, 'exam_add']);
    Route::post('admin/examinations/exam/add', [ExaminationsController::class, 'exam_insert']);
    Route::get('admin/examinations/exam/edit/{id}', [ExaminationsController::class, 'exam_edit']);
    Route::post('admin/examinations/exam/edit/{id}', [ExaminationsController::class, 'exam_update']);
    Route::get('admin/examinations/exam/delete/{id}', [ExaminationsController::class, 'exam_delete']);
    Route::get('admin/examinations/exam_schedule', [ExaminationsController::class, 'exam_schedule']);
    Route::post('admin/examinations/exam_schedule_insert', [ExaminationsController::class, 'exam_schedule_insert']);
    Route::get('admin/examinations/mark_register', [ExaminationsController::class, 'mark_register']);
    Route::post('admin/examinations/mark_register_save', [ExaminationsController::class, 'mark_register_save']);
    

    //attendance
    Route::get('admin/attendance/student', [AttendanceController::class, 'student_attendance']);
    Route::post('admin/attendance/student/save', [AttendanceController::class, 'student_attendance_insert']);
    Route::get('admin/attendance/report', [AttendanceController::class, 'student_attendance_report']);
    
    

    //change_password
    Route::get('admin/change_password', [UserController::class, 'change_password']);
    Route::post('admin/change_password', [UserController::class, 'update_change_password']);

    //settins
    Route::get('admin/settings', [UserController::class, 'settings']);
    Route::post('admin/settings', [UserController::class, 'settings_insert']);


});
Route::group(['middleware' => 'Teacher'], function () {
    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard1'])->name('teacher.dashboard');
    //change_password
    Route::get('teacher/change_password', [UserController::class, 'change_password']);
    Route::post('teacher/change_password', [UserController::class, 'update_change_password']);
    //my_class_subject
    Route::get('teacher/my_class_subject', [ClassTeacherController::class, 'my_class_subject']);
    Route::get('teacher/my_class_subject/class_time/{class_id}/{subject_id}', [ClassTimeController::class, 'teacher_class_time']);
    //my_student
    Route::get('teacher/my_student', [AdminStudentController::class, 'my_student']);
    //my_calender
    Route::get('teacher/my_calendar', [TeacherCalendarController::class, 'MyCalendarTeacher']);

    //attendance
    Route::get('teacher/attendance/student', [AttendanceController::class, 'teacher_student_attendance']);
    Route::post('teacher/attendance/student/save', [AttendanceController::class, 'student_attendance_insert']);
    Route::get('teacher/attendance/report', [AttendanceController::class, 'teacher_student_attendance_report']);

    //marks_register
    Route::get('teacher/mark_register', [ExaminationsController::class, 'teacher_mark_register']);
    Route::post('teacher/mark_register_save', [ExaminationsController::class, 'teacher_mark_register_save']);
    //my_account
    Route::get('teacher/account', [UserController::class, 'MyAccount']);
    Route::post('teacher/account', [UserController::class, 'UpdateMyAccount']);


});
Route::group(['middleware' => 'Student'], function () {
    Route::get('student/dashboard', [DashboardController::class, 'dashboard1'])->name('student.dashboard');

    //change_password
    Route::get('student/change_password', [UserController::class, 'change_password']);
    Route::post('student/change_password', [UserController::class, 'update_change_password']);

    //fees_collection
    Route::get('student/fees_collection', [FeesCollectionController::class, 'student_collect_fees']);
    Route::post('student/fees_collection', [FeesCollectionController::class, 'student_collect_fees_payment']);
    
    Route::get('student/my_subject', [SubjectController::class, 'my_subject']);
    Route::get('student/my_timetable', [ClassTimeController::class, 'MyTimetable']);

    Route::get('student/my_calendar', [CalendarController::class, 'MyCalendar']);
    //my_attendance
    Route::get('student/my_attendance', [AttendanceController::class, 'my_attendance']);


    //my_exam_result
    Route::get('student/my_exam_result', [ExaminationsController::class, 'my_exam_result']);
    //my_account
    Route::get('student/my_account', [UserController::class, 'MyAccount']);    
    Route::post('teacher/account', [UserController::class, 'UpdateMyAccount']);


});












