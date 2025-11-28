<x-admin.layout :title="$title">

    <div class="min-h-[75vh] flex items-center justify-center">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 
                    p-8 w-full max-w-lg">

            <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white text-center">
                Edit Classroom
            </h2>

            <form action="{{ route('admin.classroom.update', $classroom->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Nama Kelas --}}
                <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Nama Kelas</label>
                <input type="text"
                       name="name"
                       value="{{ $classroom->name }}"
                       class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 
                              bg-gray-50 dark:bg-gray-700
                              focus:ring-2 focus:ring-blue-500 focus:outline-none mb-6"
                       required>

                {{-- Tombol Update --}}
                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg">
                    Update Classroom
                </button>

            </form>

        </div>
    </div>

</x-admin.layout>
