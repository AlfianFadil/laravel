<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;

class AdminClassroomController extends Controller
{
    /**
     * Tampilkan semua classroom (Search + Pagination)
     */
    public function index(Request $request)
    {
        $title = "Data Classroom";

        $classrooms = Classroom::withCount('students') // ⬅ hitung siswa tanpa N+1
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5)           // ⬅ pagination 5 data
            ->withQueryString();    // ⬅ search tetap saat pindah page

        return view('admin.classrooms.classrooms', compact(
            'classrooms',
            'title'
        ));
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

        return redirect()
            ->route('admin.classroom.index')
            ->with('success', 'Classroom berhasil ditambahkan!');
    }

    /**
     * Edit classroom
     */
    public function edit($id)
    {
        $classroom = Classroom::findOrFail($id);
        $title = "Edit Classroom";

        return view('admin.classrooms.edit', compact(
            'classroom',
            'title'
        ));
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

        return redirect()
            ->route('admin.classroom.index')
            ->with('success', 'Classroom berhasil diperbarui!');
    }

    /**
     * Hapus classroom
     */
    public function destroy($id)
    {
        Classroom::destroy($id);

        return redirect()
            ->route('admin.classroom.index')
            ->with('success', 'Classroom berhasil dihapus!');
    }
}
