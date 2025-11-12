<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        $classroom = Classroom::all(); 
        return view('classrooms', [
            'title' => 'Classrooms', 
            'classrooms' => $classroom
        ]);
    }
        public function adminIndex()
    {
        $classroom = Classroom::all();

        // Mengarah ke resources/views/admin/classroom.blade.php
        return view('components.admin.classrooms', [ 
            'title' => 'Data Classroom (Admin)',
            'classrooms' => $classroom
        ]);
    }
}