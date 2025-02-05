<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\StudentController; 
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\RegistrationController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//User route
Route::middleware(['auth', 'userMiddleware']) -> group(function(){

    Route::get('dashboard',[UserController::class, 'index' ] ) ->name('dashboard');
    Route::get('subjects', [SubjectController::class, 'index'])->name('user.subject.index');
    Route::get('students', [StudentController::class, 'index'])->name('user.student.index');
});

//Admin Route
Route::middleware(['auth', 'adminMiddleware']) -> group(function(){

    Route::get('/admin/dashboard',[AdminController::class, 'index' ] ) ->name('admin.dashboard');

    Route::get('/admin/subjects', [SubjectController::class, 'index'])->name('subjects.index');
    Route::get('/admin/subjects/create', [SubjectController::class, 'create'])->name('subjects.create');
    Route::post('/admin/subjects', [SubjectController::class, 'store'])->name('subjects.store');
    Route::get('/admin/subjects/{id}', [SubjectController::class, 'show'])->name('subjects.show');
    Route::get('/admin/subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
    Route::put('/admin/subjects/{subject}', [SubjectController::class, 'update'])->name('subjects.update');
    Route::delete('/admin/subjects/{subject}', [SubjectController::class, 'destroy'])->name('subjects.destroy');
    Route::get('/admin/subjects/{subject}', [SubjectController::class, 'show'])->name('subjects.show');

    Route::get('/admin/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/admin/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::get('/admin/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::delete('/admin/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
    Route::get('/admin/students/{student}', [StudentController::class, 'show'])->name('students.show');
    Route::put('/admin/students/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::post('/admin/students', [StudentController::class, 'store'])->name('students.store');
});