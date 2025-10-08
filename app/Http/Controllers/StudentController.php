<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
      /*   $students =[
            [
            'id' => 1,
            'name' => 'Aldiky Arfian S.',
            'email' =>'Aldikky@gmail.com',
            'address' => 'Jl. Contoh No. 123, Kota',
            'class' => 'XI PPLG 1',
            ],
            [
            'id' => 2,
            'name' => 'Alfian Fadhil',
            'email'=>'alfian@gmail.com',
            'address' => 'Jl. Contoh No. 456, Kota',
            'class' => 'XI PPLG 1',
            ],
            [
            'id' => 3,
            'name' => 'Michael Jackson',
            'email'=>'michael@gmail.com',
            'address' => 'Jl. Contoh No. 789, Kota',
            'class' => 'XI PPLG 1',
            ],
            [
            'id' => 4,
            'name' => 'Dhiaz Alfiansyah',
            'email'=>'dhiaz@gmail.com',
            'address' => 'Jl. Contoh No. 101, Kota',
            'class' => 'XI PPLG 1',
            ],
            [
            'id' => 5,
            'name' => 'Osmar Ghalib Albani',
            'email'=>'somar@gmail.com',
            'address' => 'Jl. Contoh No. 102, Kota',
            'class' => 'XI PPLG 1',
            ],
        ];
 */
        $students = \App\Models\Student::all();
        return view('student',  compact('students'),[
            'title' => '🎓 Student'
        ]);
    }

}