<x-admin.layout :title="$title">

    {{-- Header dan Tombol Tambah --}}
    <div class="flex justify-between items-center mt-10 mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Teacher List</h1>

        <button 
            data-modal-target="addTeacherModal" 
            data-modal-toggle="addTeacherModal"
            class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">
            + Tambah Teacher
        </button>
    </div>

    {{-- Table --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Nama</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">No HP</th>
                    <th class="px-6 py-3">Alamat</th>
                    <th class="px-6 py-3">Mapel</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $i => $teacher)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $i + 1 }}</td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $teacher->name }}
                        </td>

                        <td class="px-6 py-4">{{ $teacher->email }}</td>
                        <td class="px-6 py-4">{{ $teacher->phone }}</td>
                        <td class="px-6 py-4">{{ $teacher->address }}</td>

                        <td class="px-6 py-4">
                            {{ $teacher->subject->name ?? '-' }}
                        </td>

                        {{-- Aksi --}}
                        <td class="px-6 py-4 text-center flex justify-center gap-3">

                            <button
                                onclick="openEditModal({{ $teacher->id }})"
                                class="px-3 py-1 text-yellow-600 border border-yellow-600 rounded-lg text-xs hover:bg-yellow-600 hover:text-white transition">
                                Edit
                            </button>

                            <form action="{{ route('admin.teacher.destroy', $teacher->id) }}" 
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus teacher ini?')">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="px-3 py-1 text-red-600 border border-red-600 rounded-lg text-xs hover:bg-red-600 hover:text-white transition">
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- IMPORT CREATE --}}
    @include('admin.teachers.create')

    {{-- IMPORT EDIT --}}
    @include('admin.teachers.edit')

</x-admin.layout>
