<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CONTROLLERS
|--------------------------------------------------------------------------
*/

// PUBLIC CONTROLLERS
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AuthController;

// ADMIN CONTROLLERS
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProfilController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminStudentController;
use App\Http\Controllers\Admin\AdminTeacherController;
use App\Http\Controllers\Admin\AdminGuardianController;
use App\Http\Controllers\Admin\AdminSubjectController;
use App\Http\Controllers\Admin\AdminClassroomController;


/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (USER)
|--------------------------------------------------------------------------
*/

// Halaman utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman publik
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/kontak', [ContactController::class, 'index'])->name('kontak');
Route::get('/student', [StudentController::class, 'index'])->name('student');
Route::get('/guardian', [GuardianController::class, 'index'])->name('guardian');
Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher');
Route::get('/subject', [SubjectController::class, 'index'])->name('subject');
Route::get('/classroom', [ClassroomController::class, 'index'])->name('classroom');


/*
|--------------------------------------------------------------------------
| AUTH ROUTES (GLOBAL)
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'show_login'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('guest')
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (PROTECTED)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        // Profil Admin
        Route::get('/profil', [AdminProfilController::class, 'index'])
            ->name('profil');

        // Contact Admin
        Route::get('/kontak', [AdminContactController::class, 'index'])
            ->name('contact.index');

        // Classroom Admin
        Route::resource('classroom', AdminClassroomController::class)
            ->except(['show']);

        // Student Admin
        Route::resource('student', AdminStudentController::class);

        // Teacher Admin
        Route::resource('teacher', AdminTeacherController::class)
            ->except(['show']);

        // Guardian Admin
        Route::resource('guardian', AdminGuardianController::class);

        // Subject Admin
        Route::resource('subject', AdminSubjectController::class)
            ->except(['show']);
    });
