<x-admin.layout :title="$title">

    <div class="min-h-[75vh] flex items-center justify-center">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 
                    p-8 w-full max-w-lg">

            <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white text-center">
                Edit Guardian
            </h2>

            <form action="{{ route('admin.guardian.update', $guardian->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Nama --}}
                <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Nama</label>
                <input type="text"
                       name="name"
                       value="{{ $guardian->name }}"
                       class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 
                              bg-gray-50 dark:bg-gray-700
                              focus:ring-2 focus:ring-blue-500 focus:outline-none mb-4"
                       required>

                {{-- Pekerjaan --}}
                <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Pekerjaan</label>
                <input type="text"
                       name="job"
                       value="{{ $guardian->job }}"
                       class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 
                              bg-gray-50 dark:bg-gray-700
                              focus:ring-2 focus:ring-blue-500 focus:outline-none mb-4"
                       required>

                {{-- Email --}}
                <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Email</label>
                <input type="email"
                       name="email"
                       value="{{ $guardian->email }}"
                       class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 
                              bg-gray-50 dark:bg-gray-700
                              focus:ring-2 focus:ring-blue-500 focus:outline-none mb-4"
                       required>

                {{-- Alamat --}}
                <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Alamat</label>
                <textarea name="address"
                          class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 
                                 bg-gray-50 dark:bg-gray-700
                                 focus:ring-2 focus:ring-blue-500 focus:outline-none mb-6"
                          required>{{ $guardian->address }}</textarea>

                {{-- Tombol --}}
                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg">
                    Update Guardian
                </button>

            </form>

        </div>
    </div>

</x-admin.layout>
