<x-admin.layout :title="$title">

    <div class="max-w-5xl mx-auto">

        {{-- Header + Search + Add --}}
        <div class="flex flex-col md:flex-row md:justify-between md:items-center mt-10 mb-6 gap-4">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                {{ $title }}
            </h1>

            <div class="flex gap-3">
                {{-- Search --}}
                <form method="GET" action="{{ route('admin.classroom.index') }}" class="flex gap-2">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari nama kelas..."
                        class="px-4 py-2 border rounded-lg text-sm focus:ring focus:ring-blue-300 dark:bg-gray-800 dark:text-white"
                    >
                    <button
                        type="submit"
                        class="px-4 py-2 bg-gray-700 text-white text-sm rounded-lg hover:bg-gray-800">
                        Search
                    </button>
                </form>

                {{-- Add Classroom --}}
                <button onclick="openCreateModal()"
                    class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 shadow">
                    + Tambah Classroom
                </button>
            </div>
        </div>

        {{-- Alert --}}
        @if (session('success'))
            <div class="mb-6 p-3 rounded-lg bg-green-100 text-green-800 font-medium shadow">
                {{ session('success') }}
            </div>
        @endif

        {{-- Table --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Nama Kelas</th>
                        <th class="px-6 py-3">Jumlah Siswa</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($classrooms as $i => $classroom)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                            {{-- Nomor pagination --}}
                            <td class="px-6 py-4">
                                {{ $classrooms->firstItem() + $i }}
                            </td>

                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{ $classroom->name }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $classroom->students_count }} Siswa
                            </td>

                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('admin.classroom.edit', $classroom->id) }}"
                                   class="px-3 py-1 text-yellow-600 border border-yellow-600 rounded-lg text-xs hover:bg-yellow-600 hover:text-white transition">
                                    Edit
                                </a>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-6 text-center text-gray-500">
                                Data classroom tidak ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $classrooms->links() }}
        </div>

    </div>

    {{-- Import modal create --}}
    @include('admin.classrooms.create')

    {{-- Modal Script --}}
    <script>
        function openCreateModal() {
            document.getElementById('createModal').classList.remove('hidden');
        }

        function closeCreateModal() {
            document.getElementById('createModal').classList.add('hidden');
        }

        window.onclick = function(e) {
            const modal = document.getElementById('createModal');
            if (e.target === modal) modal.classList.add('hidden');
        }
    </script>

</x-admin.layout>
