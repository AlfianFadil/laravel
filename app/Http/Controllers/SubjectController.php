<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
  
    public function index()
    {
        
        $subjeced = \App\Models\subject::all();
        return view('subject',  compact('subjeced'),[
            'title' => 'subject (mata pelajaran)'
        ]);
    }

}