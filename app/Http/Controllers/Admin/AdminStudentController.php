<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classroom;

class AdminStudentController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Data Students';

        $students = Student::with('classroom')
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhereHas('classroom', function ($q) use ($search) {
                          $q->where('name', 'like', "%{$search}%");
                      });
            })
            ->orderBy('id', 'desc')
            ->paginate(5)
            ->withQueryString(); // penting agar search tidak hilang saat pindah page

        $classrooms = Classroom::all();

        return view('admin.studenents.student', compact(
            'title',
            'students',
            'classrooms'
        ));
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

        return redirect()
            ->route('admin.student.index')
            ->with('success', 'Student berhasil ditambahkan!');
    }

    /**
     * Ambil data student (AJAX Edit)
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return response()->json($student);
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

        return redirect()
            ->route('admin.student.index')
            ->with('success', 'Student berhasil diupdate!');
    }

    /**
     * Hapus student
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()
            ->route('admin.student.index')
            ->with('success', 'Student berhasil dihapus!');
    }
}
