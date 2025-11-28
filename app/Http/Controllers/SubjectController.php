<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
 public function index()
{
    $subjects = Subject::with('teachers')->get();

    return view('subject', [
        'title' => 'Subject',
        'subject' => $subjects
    ]);
}

}