<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subject;

class AdminTeacherController extends Controller
{
    /**
     * Tampilkan semua teacher
     */
    public function index()
    {
        $teachers = Teacher::with('subject')->get();
        $subjects = Subject::all();

        return view('admin.teachers.teacher', [
            'title' => 'Data Teachers',
            'teachers' => $teachers,
            'subjects' => $subjects,
        ]);
    }

    /**
     * Store teacher baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:teachers,email',
            'phone'      => 'required|string|max:20',
            'address'    => 'required|string',
            'subject_id' => 'required|exists:subjects,id'
        ]);

        Teacher::create($validated);

        return redirect()->route('admin.teacher.index')
            ->with('success', 'Teacher berhasil ditambahkan!');
    }

    /**
     * Ambil data teacher untuk modal edit
     */
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return response()->json($teacher);
    }

    /**
     * Update teacher 
     */
    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:teachers,email,' . $teacher->id,
            'phone'      => 'required|string|max:20',
            'address'    => 'required|string',
            'subject_id' => 'required|exists:subjects,id'
        ]);

        $teacher->update($validated);

        return redirect()->route('admin.teacher.index')
            ->with('success', 'Teacher berhasil diupdate!');
    }

    /**
     * Hapus teacher
     */
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('admin.teacher.index')
            ->with('success', 'Teacher berhasil dihapus!');
    }
}
