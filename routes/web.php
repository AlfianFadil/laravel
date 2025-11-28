<?php

use Illuminate\Support\Facades\Route;

// PUBLIC CONTROLLERS
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ProfilController;

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

// Halaman publik lainnya
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/kontak', [ContactController::class, 'index'])->name('kontak');
Route::get('/student', [StudentController::class, 'index'])->name('student');
Route::get('/guardian', [GuardianController::class, 'index'])->name('guardian');
Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher');
Route::get('/subject', [SubjectController::class, 'index'])->name('subject');
Route::get('/classroom', [ClassroomController::class, 'index'])->name('classroom');


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('dashboard');

    // Profil Admin
    Route::get('/profil', [AdminProfilController::class, 'index'])
        ->name('profil');

    // Contact Admin
    Route::get('/kontak', [AdminContactController::class, 'index'])
        ->name('contact.index');

    // CRUD Classroom Admin
    Route::resource('classroom', AdminClassroomController::class)->except(['show'])->names([
        'index'   => 'classroom.index',
        'create'  => 'classroom.create',
        'store'   => 'classroom.store',
        'edit'    => 'classroom.edit',
        'update'  => 'classroom.update',
    ]);

   // STUDENT ADMIN - FULL CRUD
    Route::resource('student', AdminStudentController::class)->names([
        'index' => 'student.index',
        'store' => 'student.store',
        'edit' => 'student.edit',
        'update' => 'student.update',
        'destroy' => 'student.destroy',
   ]);


    Route::resource('teacher', AdminTeacherController::class)->except(['show'])->names([
        'index'   => 'teacher.index',
        'create'  => 'teacher.create',
        'store'   => 'teacher.store',
        'edit'    => 'teacher.edit',
        'update'  => 'teacher.update',
        'destroy' => 'teacher.destroy',
    ]);

    Route::resource('guardian', AdminGuardianController::class)->names([
        'index' => 'guardian.index',
        'create' => 'guardian.create',
        'store' => 'guardian.store',
        'edit' => 'guardian.edit',
        'update' => 'guardian.update',
        'destroy' => 'guardian.destroy',
    ]);


   // SUBJECT ADMIN - FULL CRUD
   Route::resource('subject', AdminSubjectController::class)->except(['show'])->names([
       'index'   => 'subject.index',
       'create'  => 'subject.create',
       'store'   => 'subject.store',
       'edit'    => 'subject.edit',
       'update'  => 'subject.update',
    ]);

});
