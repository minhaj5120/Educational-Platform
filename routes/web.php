<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

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
Route::get('admin/dashboard', [DashboardController::class, 'dashboard1']) ->middleware('isloggedin')->name('admin.dashboard');
// Route::get('admin/dashboard', [AuthController::class, 'Authlogin']);
// Route::get('admin/admin/dashboard', [DashboardController::class, 'dashboard1']) ->middleware('isloggedin')->name('admin/admin/dashboard');
Route::get('teacher/dashboard', [DashboardController::class, 'dashboard1']) ->middleware('isloggedin')->name('teacher.dashboard');
Route::get('student/dashboard', [DashboardController::class, 'dashboard1']) ->middleware('isloggedin')->name('student.dashboard');
// Route::get('admin/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware('isloggedin');
Route::get('layout/header', function () {
    return view('admin.dashboard');
})->middleware('isloggedin');
Route::get('admin/admin/list', function () {
    return view('admin.admin.list');
})->middleware('isloggedin');
Route::get('admin/admin/dashboard', function () {
    return view('admin.admin.dashboard');
})->middleware('isloggedin');
Route::get('student/student/dashboard', function () {
    return view('student.student.dashboard');
})->middleware('isloggedin');
Route::get('student/list', function () {
    return view('student.list');
})->middleware('isloggedin');
Route::get('teacher/list', function () {
    return view('teacher.list');
})->middleware('isloggedin');
Route::get('teacher/dashboard', function () {
    return view('teacher.dashboard');
})->middleware('isloggedin');

Route::get('/login', [AuthController::class, 'login']); // This is for displaying the login form
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
// // Route::group(['middleware' => 'Admin'], function () {
// //     Route::get('admin/admin/list', function () {
// //         return view('admin.admin.list');});
// // });
// Route::group(['middleware' => 'Teacher'], function () {
//     Route::get('teacher/dashboard', [DashboardController::class, 'dashboard1'])->name('teacher.dashboard');
// });
// Route::group(['middleware' => 'Student'], function () {
//     Route::get('student/dashboard', [DashboardController::class, 'dashboard1'])->name('student.dashboard');
// });












