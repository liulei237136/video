<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\VideoController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [IndexController::class, 'index']);
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store')->middleware(['auth','verified']);

Route::get('/videos/create', [VideoController::class, 'create']);
Route::post('/videos', [VideoController::class, 'store']);
//Route::get('/', [VideoController::class, 'index']);
Route::get('/videos/{video}', [VideoController::class, 'show'])->name('video.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
