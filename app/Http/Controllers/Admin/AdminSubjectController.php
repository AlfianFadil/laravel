<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class AdminSubjectController extends Controller
{
    /**
     * Tampilkan daftar semua subject (versi Admin)
     */
    public function index()
    {
        $subject = Subject::with('teachers')->get();

        // Mengarah ke: resources/views/components/admin/subject.blade.php
        return view('components.admin.subject', [
            'title' => 'Data Mata Pelajaran (Admin)',
            'subject' => $subject
        ]);
    }
}