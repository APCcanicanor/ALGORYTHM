<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SyllabusController;
use App\Http\Controllers\ShowSyllabusController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\viewITController;
use App\Http\Controllers\biologyController;


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
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {Route::get('/askAI', function () {return view('askAI');})->name('askAI');});

Route::get('/create', function () {return view('create');})->middleware('auth', 'teacher_or_executive');
Route::get('/YourWorks', function () {return view('YourWorks');})->middleware('auth', 'teacher_or_executive');
Route::get('/forApproval', function () {return view('forApproval');})->middleware('auth', 'Exd_only');

Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/store-syllabus', [SyllabusController::class, 'store'])->name('store-syllabus.create');
Route::get('/askAI', function () {return view('askAI');})->name('askAI');


Route::get('/YourWorks', [ShowSyllabusController::class, 'show'])->name('YourWorks');
Route::get('/syllabus/{id}', [ShowSyllabusController::class, 'details'])->name('syllabus.details');
Route::get('/syllabus/{id}/edit', [ShowSyllabusController::class, 'edit'])->name('syllabus.edit');
Route::put('/syllabus/{id}', [ShowSyllabusController::class, 'update'])->name('syllabus.update');
Route::delete('/syllabus/{id}', [ShowSyllabusController::class, 'destroy'])->name('syllabus.destroy');
Route::post('/syllabus/sendForApproval/{id}', [ShowSyllabusController::class, 'sendForApproval'])->name('syllabus.sendForApproval');


Route::get('/forApproval', [ApprovalController::class, 'show'])->name('forApproval');
Route::get('/syllabus/sendForApproval/{id}', [ApprovalController::class, 'details'])->name('syllabus.sendForApproval');

Route::post('/reject-approval/{id}', [ApprovalController::class, 'rejectApproval'])->name('reject.approval');
Route::post('/approve-syllabus/{id}', [ApprovalController::class, 'approveSyllabus'])->name('approve.syllabus');

Route::get('/view_syllabus.IT', [viewITController::class, 'show'])->name('view_syllabus.IT');
Route::get('/view_syllabus.IT/{id}', [viewITController::class, 'details'])->name('it-view');

Route::get('/view_syllabus.biology', [biologyController::class, 'show'])->name('view_syllabus.biology');
Route::get('/contents.view-biology/{id}', [biologyController::class, 'details'])->name('content.view-biology');

Route::post('/chat', 'App\Http\Controllers\ChatController');

Route::delete('/delete-syllabus/{id}', [ApprovalController::class, 'delete'])->name('delete.syllabus');
