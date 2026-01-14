<x-admin.layout :title="$title">

    {{-- Header, Tombol Tambah & Search --}}
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mt-10 mb-6 gap-4">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
            Student List
        </h1>

        <div class="flex gap-3">
            {{-- Search --}}
            <form method="GET" action="{{ route('admin.student.index') }}" class="flex gap-2">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama / email / kelas..."
                    class="px-4 py-2 border rounded-lg text-sm focus:ring focus:ring-blue-300 dark:bg-gray-800 dark:text-white"
                >
                <button
                    type="submit"
                    class="px-4 py-2 bg-gray-700 text-white text-sm rounded-lg hover:bg-gray-800">
                    Search
                </button>
            </form>

            {{-- Tombol Tambah --}}
            <button 
                data-modal-target="addStudentModal" 
                data-modal-toggle="addStudentModal"
                class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">
                + Tambah Student
            </button>
        </div>
    </div>

    {{-- Table --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Nama</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Alamat</th>
                    <th class="px-6 py-3">Kelas</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $i => $student)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        {{-- Nomor urut pagination --}}
                        <td class="px-6 py-4">
                            {{ $students->firstItem() + $i }}
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $student->name }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $student->email }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $student->address }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $student->classroom->name ?? '-' }}
                        </td>

                        {{-- Aksi --}}
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-3">
                                {{-- Edit --}}
                                <button
                                    onclick="openEditModal({{ $student->id }})"
                                    class="px-3 py-1 text-yellow-600 border border-yellow-600 rounded-lg text-xs hover:bg-yellow-600 hover:text-white transition">
                                    Edit
                                </button>

                                {{-- Delete --}}
                                <form action="{{ route('admin.student.destroy', $student->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus student ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="px-3 py-1 text-red-600 border border-red-600 rounded-lg text-xs hover:bg-red-600 hover:text-white transition">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-6 text-center text-gray-500">
                            Data student tidak ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $students->links() }}
    </div>

    {{-- IMPORT MODAL CREATE --}}
    @include('admin.studenents.create')

    {{-- IMPORT MODAL EDIT --}}
    @include('admin.studenents.edit')

</x-admin.layout>
