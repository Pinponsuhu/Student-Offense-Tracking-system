<?php

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
Route::get('/report', [NavigateController::class, 'report']);
Route::get('/see/student', [NavigateController::class, 'see_student']);
Route::get('/file/student', [NavigateController::class, 'file_offense']);
