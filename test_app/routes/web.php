<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', function () {return view('welcome');});
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');});
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {Route::get('/courses', function () {return view('courses');})->name('courses');});
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {Route::get('/IT', function () {return view('view_syllabus.IT');})->name('view_syllabus.IT');});
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {Route::get('/biology', function () {return view('view_syllabus.biology');})->name('view_syllabus.biology');});

Route::get('/create', function () {return view('create');})->middleware('auth', 'teacher_or_executive');

Route::post('/register', [RegisterController::class, 'register'])->name('register');
