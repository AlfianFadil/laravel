<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class AdminSubjectController extends Controller
{
    /**
     * 
     */
    public function index()
    {
        $subject = Subject::with('teachers')->get();

        return view('components.admin.subject', [
            'title' => 'Data Mata Pelajaran (Admin)',
            'subject' => $subject
        ]);
    }
}