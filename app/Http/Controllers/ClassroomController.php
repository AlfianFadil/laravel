<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function Classroom()
    {
        $classroom = Classroom::all();
        return view('classrooms',
         [
            'title' => '🏫 Classroom',
            'classrooms' => $classroom
         ]);
    }
}

