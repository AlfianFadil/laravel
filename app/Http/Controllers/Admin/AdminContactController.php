<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminContactController extends Controller
{
    public function index()
    {
        // Data kontak bisa kamu ubah sesuai kebutuhan
        $contact = [
            'email' => 'mywifebeth27@gmail.com',
            'instagram' => '@molcy',
            'whatsapp' => '+62 851-8924-8238'
        ];

        return view('components.admin.contact', [
            'title' => 'Kontak Admin',
            'email' => $contact['email'],
            'instagram' => $contact['instagram'],
            'whatsapp' => $contact['whatsapp']
        ]);
    }
}
