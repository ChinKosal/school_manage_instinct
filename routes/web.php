<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/class', [App\Http\Controllers\ClassController::class, 'index'])->name('class.index');
Route::get('/class/create', [App\Http\Controllers\ClassController::class, 'create'])->name('class.create');
Route::post('/class/save', [App\Http\Controllers\ClassController::class, 'save'])->name('class.save');
Route::get('/class/edit/{id}', [App\Http\Controllers\ClassController::class, 'edit'])->name('class.edit');
Route::post('/class/update', [App\Http\Controllers\ClassController::class, 'update'])->name('class.update');
Route::get('/class/delete/{id}', [App\Http\Controllers\ClassController::class, 'delete'])->name('class.delete');


Route::get('/student', [App\Http\Controllers\StudentController::class, 'index'])->name('student.index');
Route::get('/student/create', [App\Http\Controllers\StudentController::class, 'create'])->name('student.create');
Route::post('/student/save', [App\Http\Controllers\StudentController::class, 'save'])->name('student.save');
Route::get('/student/edit/{id}', [App\Http\Controllers\StudentController::class, 'edit'])->name('student.edit');
Route::post('/student/update', [App\Http\Controllers\StudentController::class, 'update'])->name('student.update');
Route::get('/student/delete/{id}', [App\Http\Controllers\StudentController::class, 'delete'])->name('student.delete');


Route::get('/attendand', [App\Http\Controllers\AttendandController::class, 'index'])->name('attendand.index');
Route::get('/attendand/create', [App\Http\Controllers\AttendandController::class, 'create'])->name('attendand.create');
Route::post('/attendand/save', [App\Http\Controllers\AttendandController::class, 'save'])->name('attendand.save');
Route::get('/attendand/edit/{id}', [App\Http\Controllers\AttendandController::class, 'edit'])->name('attendand.edit');
Route::post('/attendand/update', [App\Http\Controllers\AttendandController::class, 'update'])->name('attendand.update');
Route::get('/attendand/delete/{id}', [App\Http\Controllers\AttendandController::class, 'delete'])->name('attendand.delete');