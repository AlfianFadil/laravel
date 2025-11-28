<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;

class AdminClassroomController extends Controller
{
    /**
     * Tampilkan semua classroom
     */
    public function index()
    {
        $classrooms = Classroom::orderBy('created_at', 'DESC')->get();
        $title = "Data Classroom";

        return view('admin.classrooms.classrooms', compact('classrooms', 'title'));
    }

    /**
     * (Tidak dipakai karena create memakai modal)
     */
    public function create()
    {
        return view('admin.classrooms.create', [
            'title' => 'Tambah Kelas'
        ]);
    }

    /**
     * Simpan classroom baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:100',
        ]);

        Classroom::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.classroom.index')
            ->with('success', 'Classroom berhasil ditambahkan!');
    }

    /**
     * Edit classroom
     */
    public function edit($id)
    {
        $classroom = Classroom::findOrFail($id);
        $title = "Edit Classroom";

        return view('admin.classrooms.edit', compact('classroom', 'title'));
    }

    /**
     * Update classroom
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:2|max:100',
        ]);
 
        Classroom::where('id', $id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.classroom.index')
            ->with('success', 'Classroom berhasil diperbarui!');
    }

    /**
     * Hapus classroom
     */
    public function destroy($id)
    {
        Classroom::destroy($id);

        return redirect()->route('admin.classroom.index')
            ->with('success', 'Classroom berhasil dihapus!');
    }
}
