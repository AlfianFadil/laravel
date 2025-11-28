<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classroom;

class AdminStudentController extends Controller
{
    public function index()
    {
        $students = Student::with('classroom')->get();
        $classrooms = Classroom::all();

        return view('admin.studenents.student', [
            'title' => 'Data Students',
            'students' => $students,
            'classrooms' => $classrooms
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'address' => 'required|string',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        Student::create($validated);

        return redirect()->route('admin.student.index')->with('success', 'Student berhasil ditambahkan!');
    }

    /**
     * Ambil data student untuk modal edit
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return response()->json($student); // dipakai AJAX
    }

    /**
     * Update student
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'address' => 'required|string',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        $student->update($validated);

        return redirect()->route('admin.student.index')->with('success', 'Student berhasil diupdate!');
    }

    /**
     * Hapus student
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('admin.student.index')->with('success', 'Student berhasil dihapus!');
    }
}
