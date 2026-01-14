<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guardian;
use Illuminate\Http\Request;

class AdminGuardianController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Guardian List';

        $guardian = Guardian::when($request->search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('job', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('address', 'like', "%{$search}%");
            })
            ->orderBy('id', 'desc')
            ->paginate(5)            // ✅ pagination 5 data
            ->withQueryString();     // ✅ search tetap saat pindah halaman

        return view('admin.guardians.guardian', compact(
            'title',
            'guardian'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'job'     => 'required',
            'email'   => 'required|email|unique:guardians,email',
            'address' => 'required'
        ]);

        Guardian::create($request->all());

        return redirect()
            ->route('admin.guardian.index')
            ->with('success', 'Guardian berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $guardian = Guardian::findOrFail($id);

        return view('admin.guardians.edit', compact(
            'guardian'
        ));
    }

    public function update(Request $request, $id)
    {
        $guardian = Guardian::findOrFail($id);

        $request->validate([
            'name'    => 'required',
            'job'     => 'required',
            'email'   => 'required|email|unique:guardians,email,' . $guardian->id,
            'address' => 'required'
        ]);

        $guardian->update($request->all());

        return redirect()
            ->route('admin.guardian.index')
            ->with('success', 'Guardian berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $guardian = Guardian::findOrFail($id);
        $guardian->delete();

        return redirect()
            ->route('admin.guardian.index')
            ->with('success', 'Guardian berhasil dihapus!');
    }
}
