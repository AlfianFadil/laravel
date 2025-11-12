<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index(){
return view('contact', ['title' => 'Contact']);
    }
    public function adminIndex()
    {
        return view('components.admin.Contact', [
            'title' => 'contact Admin',
            'email' => 'mywifebeth27@gmail.com',
            'instagram' => '@molcy',
            'whatsapp' => '+62 812-3456-7890'
        ]);
    }
}
