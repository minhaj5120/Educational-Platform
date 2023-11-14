<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassSubjectController;

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
// Route::get('admin/dashboard', [DashboardController::class, 'dashboard1'])->name('admin.dashboard');
// // Route::get('admin/dashboard', [AuthController::class, 'Authlogin']);
// // Route::get('admin/admin/dashboard', [DashboardController::class, 'dashboard1']) ->middleware('isloggedin')->name('admin/admin/dashboard');
// Route::get('teacher/dashboard', [DashboardController::class, 'dashboard1'])->name('teacher.dashboard');
// Route::get('student/dashboard', [DashboardController::class, 'dashboard1'])->name('student.dashboard');
// Route::get('admin/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware('isloggedin');
// Route::get('layout/header', function () {
//     return view('admin.dashboard');
// })->middleware('isloggedin');
// Route::get('admin/admin/list', function () {
//     return view('admin.admin.list');
// })->middleware('isloggedin');
// Route::get('admin/admin/dashboard', function () {
//     return view('admin.admin.dashboard');
// })->middleware('isloggedin');
// Route::get('student/student/dashboard', function () {
//     return view('student.student.dashboard');
// })->middleware('isloggedin');
// Route::get('student/list', function () {
//     return view('student.list');
// })->middleware('isloggedin');
// Route::get('teacher/list', function () {
//     return view('teacher.list');
// })->middleware('isloggedin');
// Route::get('teacher/dashboard', function () {
//     return view('teacher.dashboard');
// })->middleware('isloggedin');

Route::get('/login', [AuthController::class, 'login'])->name('login');

// Route::get('/login', [AuthController::class, 'login']); // This is for displaying the login form
Route::post('/Authlogin', [AuthController::class, 'Authlogin'])->name('Authlogin'); // This is for handling the form submission
Route::get('/registration', [AuthController::class, 'registration']);
Route::post('/registerUser', [AuthController::class, 'registerUser'])->name('registerUser');
Route::get('/logout', [AuthController::class, 'logout']);


// Route::group(['middleware' => 'Admin'], function () {
//     Route::get('admin/dashboard', [DashboardController::class, 'dashboard1'])->name('admin.dashboard');
// });
// // Route::group(['middleware' => 'Admin'], function () {
// //     Route::get('admin/dashboard', [DashboardController::class, 'dashboard1']);
// // });
Route::group(['middleware' => 'Admin'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard1'])->name('admin.dashboard');
    Route::get('admin/admin/dashboard', [DashboardController::class, 'dashboard1']);
    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'insert']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);
    Route::get('admin/admin/search', [AdminController::class, 'search']);
    

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

});
Route::group(['middleware' => 'Teacher'], function () {
    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard1'])->name('teacher.dashboard');
    // Route::get('admin/admin/list', [AdminController::class, 'list']);

});
Route::group(['middleware' => 'Student'], function () {
    Route::get('student/dashboard', [DashboardController::class, 'dashboard1'])->name('student.dashboard');
});












