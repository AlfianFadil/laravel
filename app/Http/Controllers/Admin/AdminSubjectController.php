<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class AdminSubjectController extends Controller
{
    public function index()
    {
        $data = Subject::all();

        return view('admin.subjects.subject', [
            'title' => "Data Subject",
            'subject' => $data
        ]);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255'
        ]);

        Subject::create($validasi);

        return redirect()->route('admin.subject.index');
    }

    public function update(Request $request, string $id)
    {
        $subject = Subject::findOrFail($id);

        $validasi = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255'
        ]);
        
        $subject->update($validasi);

        return redirect()->route('admin.subject.index');
    }

    public function destroy(string $id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('admin.subject.index');
    }
}
