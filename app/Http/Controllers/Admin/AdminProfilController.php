<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminProfilController extends Controller
{
    public function index()
    {
       return view('components.admin.profile', [
    'title' => 'Profil Admin',
    'nama' => 'Alfian Fadil',
    'kelas' => '11 PPLG 1',
    'sekolah' => 'SMK Raden Umar Said',
]);

    }
}
