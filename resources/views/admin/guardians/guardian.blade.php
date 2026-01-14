<x-admin.layout :title="$title">

    <div class="max-w-5xl mx-auto">

        {{-- Header + Search + Add --}}
        <div class="flex flex-col md:flex-row md:justify-between md:items-center mt-10 mb-6 gap-4">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                Guardian List
            </h1>

            <div class="flex gap-3">
                {{-- Search --}}
                <form method="GET" action="{{ route('admin.guardian.index') }}" class="flex gap-2">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari nama / pekerjaan / email..."
                        class="px-4 py-2 border rounded-lg text-sm focus:ring focus:ring-blue-300 dark:bg-gray-800 dark:text-white"
                    >
                    <button
                        type="submit"
                        class="px-4 py-2 bg-gray-700 text-white text-sm rounded-lg hover:bg-gray-800">
                        Search
                    </button>
                </form>

                {{-- Add Guardian --}}
                <button onclick="openCreateModal()"
                    class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 shadow">
                    + Add Guardian
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
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">Pekerjaan</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Alamat</th>
                        <th class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($guardian as $i => $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                            {{-- Nomor pagination --}}
                            <td class="px-6 py-4">
                                {{ $guardian->firstItem() + $i }}
                            </td>

                            <td class="px-6 py-4">{{ $item->name }}</td>
                            <td class="px-6 py-4">{{ $item->job }}</td>
                            <td class="px-6 py-4">{{ $item->email }}</td>
                            <td class="px-6 py-4">{{ $item->address }}</td>

                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.guardian.edit', $item->id) }}"
                                        class="px-3 py-1 text-yellow-600 border border-yellow-600 rounded-lg text-xs hover:bg-yellow-600 hover:text-white transition">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.guardian.destroy', $item->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="px-3 py-1 text-red-600 border border-red-600 rounded-lg text-xs hover:bg-red-600 hover:text-white transition">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-6 text-center text-gray-500">
                                Data guardian tidak ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $guardian->links() }}
        </div>

    </div>

    {{-- import modal --}}
    @include('admin.guardians.create')

    {{-- Modal Script --}}
    <script>
        function openCreateModal() {
            document.getElementById('createModal').classList.remove('hidden');
        }

        function closeCreateModal() {
            document.getElementById('createModal').classList.add('hidden');
        }

        window.onclick = function (e) {
            const modal = document.getElementById('createModal');
            if (e.target === modal) modal.classList.add('hidden');
        }
    </script>

</x-admin.layout>
