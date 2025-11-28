<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Classroom;
use App\Models\Guardian;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'title'         => 'Dashboard Admin',
            'totalStudents' => Student::count(),
            'totalTeachers' => Teacher::count(),
            'totalSubjects' => Subject::count(),
            'totalClasses'  => Classroom::count(),
            'totalGuardians'=> Guardian::count(),
        ]);
    }
}
