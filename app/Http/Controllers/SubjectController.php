<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subject = Subject::all(); 
        return view('subject', [
            'title' => 'Subject', 
            'subject' => $subject
        ]);
    }
}