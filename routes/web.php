<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\ClassroomController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Dashboard (sebaiknya buat DashboardController juga)
Route::get('/dashboard', function () {
    return view('dashboard', [
        'title' => '📊 Dashboard'
    ]);
})->name('dashboard');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/student', [StudentController::class, 'index'])->name('student');
Route::get('/classroom', [ClassroomController::class, 'index'])->name('classroom');
Route::resource('guardians', GuardianController::class);