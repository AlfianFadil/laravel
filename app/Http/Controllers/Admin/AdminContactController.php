<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminContactController extends Controller
{
    public function index()
    {
        $contact = [
            'email' => 'mywifebeth27@gmail.com',
            'instagram' => '@molcy',
            'whatsapp' => '+62 851-8924-8238'
        ];

        return view('admin.contact', [
            'title' => 'Kontak Admin',
            'email' => $contact['email'],
            'instagram' => $contact['instagram'],
            'whatsapp' => $contact['whatsapp']
        ]);
    }
}
