<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\NavigateController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [NavigateController::class, 'index']);
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loging']);
Route::get('/dashboard', [NavigateController::class, 'dashboard']);
Route::get('/all/students', [NavigateController::class, 'all_student']);
Route::get('/all/marshal', [NavigateController::class, 'all_marshal']);
Route::get('/all/admin', [NavigateController::class, 'all_admin']);
Route::post('/add/marshal', [NavigateController::class, 'add_marshal']);
Route::post('/add/admin', [NavigateController::class, 'add_admin']);
Route::get('/search/student', [NavigateController::class, 'search_student']);
Route::get('/generate/report', [NavigateController::class, 'generate_report']);
Route::post('/add/students', [NavigateController::class, 'store_student']);
Route::post('/add/offense', [NavigateController::class, 'add_offense']);
Route::get('/report', [NavigateController::class, 'report']);
Route::post('/logout', [NavigateController::class, 'logout']);
Route::get('/see/student', [NavigateController::class, 'see_student']);
Route::get('/file/student', [NavigateController::class, 'file_offense']);
Route::get('/marshal/details/{id}',[NavigateController::class, 'marshal_details']);
Route::get('/student/details/{id}',[NavigateController::class, 'student_details']);
Route::get('/admin/details/{id}',[NavigateController::class, 'admin_details']);
Route::post('/marshal/picture/{id}',[NavigateController::class, 'change_marshall_picture']);
Route::post('/admin/picture/{id}',[NavigateController::class, 'change_marshall_picture']);
Route::post('/marshal/update/{id}', [NavigateController::class, 'update_marshal']);
Route::post('/student/update/{id}', [NavigateController::class, 'update_student']);
Route::post('/admin/update/{id}', [NavigateController::class, 'update_admin']);
Route::get('/marshal/delete/{id}', [NavigateController::class, 'delete_marshal']);
Route::get('/student/delete/{id}', [NavigateController::class, 'delete_student']);
Route::get('/admin/delete/{id}', [NavigateController::class, 'delete_admin']);
Route::post('/marshal/password/{id}',[NavigateController::class, 'marshal_password']);
Route::post('/admin/password/{id}',[NavigateController::class, 'admin_password']);
Route::get('/search/student',[NavigateController::class,'search_student_all']);
Route::get('/search/marshal',[NavigateController::class,'search_marshal_all']);