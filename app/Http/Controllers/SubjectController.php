<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject; // pastikan model ini ada

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();

        return view('subject', [
            'title' => 'Subject (Mata Pelajaran)',
            'subjects' => $subjects
        ]);
    }
}
