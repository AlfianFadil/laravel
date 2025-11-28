<x-admin.layout :title="$title">

    <div class="max-w-5xl mx-auto">

        {{-- Header --}}
        <div class="flex justify-between items-center mt-10 mb-6">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                Guardian List
            </h1>

            <button onclick="openCreateModal()"
                class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 shadow">
                + Add Guardian
            </button>
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
                    @foreach ($guardian as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $item->name }}</td>
                            <td class="px-6 py-4">{{ $item->job }}</td>
                            <td class="px-6 py-4">{{ $item->email }}</td>
                            <td class="px-6 py-4">{{ $item->address }}</td>

                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('admin.guardian.edit', $item->id) }}"
                                    class="px-3 py-1 text-yellow-600 border border-yellow-600 rounded-lg text-xs hover:bg-yellow-600 hover:text-white transition">
                                    Edit
                                </a>

                                <form action="{{ route('admin.guardian.destroy', $item->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-1 text-red-600 border border-red-600 rounded-lg text-xs hover:bg-red-600 hover:text-white transition">
                                        Hapus
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>

    {{-- import modal --}}
    @include('admin.guardians.create')

    <script>
        function openCreateModal() {
            document.getElementById('createModal').classList.remove('hidden');
        }

        function closeCreateModal() {
            document.getElementById('createModal').classList.add('hidden');
        }

        // close when clicking outside
        window.onclick = function (e) {
            const modal = document.getElementById('createModal');
            if (e.target === modal) modal.classList.add('hidden');
        }
    </script>

</x-admin.layout>
