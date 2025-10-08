<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
  
    public function index()
    {
        
        $teachers = \App\Models\Teacher::all();
        return view('teacher',  compact('teachers'),[
            'title' => 'teacher'
        ]);
    }

}