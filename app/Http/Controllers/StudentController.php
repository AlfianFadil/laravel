<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Halaman utama (frontend)
     */
    public function index()
    {
        $students = Student::all();

        return view('student', [
            'title' => 'Student',
            'students' => $students
        ]);
    }

    /**
     * Halaman admin (backend)
     */

}