<x-admin.layout :title="$title">

    <div class="pt-16 sm:pt-20">

        {{-- Welcome Card --}}
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 border border-gray-200 dark:border-gray-700 text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Welcome to Admin Panel</h1>
            <p class="text-gray-600 dark:text-gray-300 mt-2">
                Kelola seluruh data seperti siswa, guru, mata pelajaran, wali siswa, dan kelas.
            </p>
        </div>

        {{-- Statistik Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 mb-6">

            {{-- Students --}}
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow border border-gray-200 dark:border-gray-700 text-center">
                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Total Students</h2>
                <p class="text-3xl font-bold text-indigo-600 dark:text-indigo-400 mt-2">
                    {{ $totalStudents }}
                </p>
            </div>

            {{-- Teachers --}}
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow border border-gray-200 dark:border-gray-700 text-center">
                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Total Teachers</h2>
                <p class="text-3xl font-bold text-indigo-600 dark:text-indigo-400 mt-2">
                    {{ $totalTeachers }}
                </p>
            </div>

            {{-- Subjects --}}
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow border border-gray-200 dark:border-gray-700 text-center">
                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Subjects</h2>
                <p class="text-3xl font-bold text-indigo-600 dark:text-indigo-400 mt-2">
                    {{ $totalSubjects }}
                </p>
            </div>

            {{-- Classrooms --}}
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow border border-gray-200 dark:border-gray-700 text-center">
                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Classrooms</h2>
                <p class="text-3xl font-bold text-indigo-600 dark:text-indigo-400 mt-2">
                    {{ $totalClasses }}
                </p>
            </div>

            {{-- Guardians --}}
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow border border-gray-200 dark:border-gray-700 text-center">
                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Guardians</h2>
                <p class="text-3xl font-bold text-indigo-600 dark:text-indigo-400 mt-2">
                    {{ $totalGuardians }}
                </p>
            </div>

        </div>

        {{-- Placeholder Grafik --}}
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-700 h-96 flex items-center justify-center">
            <span class="text-gray-400 dark:text-gray-500">Tambahkan grafik atau laporan di sini...</span>
        </div>

    </div>

</x-admin.layout>
