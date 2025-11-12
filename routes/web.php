<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ProfilController;

// Controller Admin
use App\Http\Controllers\Admin\AdminStudentController;
use App\Http\Controllers\Admin\AdminTeacherController;
use App\Http\Controllers\Admin\AdminGuardianController;
use App\Http\Controllers\Admin\AdminSubjectController;
use App\Http\Controllers\Admin\AdminClassroomController;
use App\Http\Controllers\Admin\AdminProfilController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminDashboardController;

// Redirect root langsung ke dashboard admin
Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});


// ================== ROUTE UNTUK USER / PUBLIC ===========
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
    Route::get('/kontak', [ContactController::class, 'index'])->name('kontak');
    Route::get('/student', [StudentController::class, 'index'])->name('student');
    Route::get('/guardian', [GuardianController::class, 'index'])->name('guardian');
    Route::get('/classroom', [ClassroomController::class, 'index'])->name('classroom');
    Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher');
    Route::get('/subject', [SubjectController::class, 'index'])->name('subject');


// ================== ROUTE UNTUK ADMIN PANEL ==================
Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard admin
    Route::get('/dashboard', [HomeController::class, 'adminDashboard'])->name('dashboard');

    // Profil admin
    Route::get('/profil', [AdminProfilController::class, 'index'])->name('profil');

    // Contact admin
    Route::get('/kontak', [AdminContactController::class, 'index'])->name('contact.index');

    // Classroom admin
    Route::get('/classroom', [ClassroomController::class, 'adminIndex'])->name('classroom.index');
    Route::post('/classroom', [ClassroomController::class, 'store'])->name('classroom.store');

    // Student admin
    Route::get('/student', [AdminStudentController::class, 'index'])->name('student.index');
    Route::post('/student', [AdminStudentController::class, 'store'])->name('student.store');

    // Teacher admin
    Route::get('/teacher', [AdminTeacherController::class, 'index'])->name('teacher.index');
    Route::post('/teacher', [AdminTeacherController::class, 'store'])->name('teacher.store');

    // Guardian admin
    Route::get('/guardian', [AdminGuardianController::class, 'index'])->name('guardian.index');
    Route::post('/guardian', [AdminGuardianController::class, 'store'])->name('guardian.store');

    // Subject admin
    Route::get('/subject', [AdminSubjectController::class, 'index'])->name('subject.index');
    Route::post('/subject', [AdminSubjectController::class, 'store'])->name('subject.store');

    
});