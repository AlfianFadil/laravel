<x-layout>
    <x-slot:judul>{{ $title }} </x-slot:judul>

    <div class="w-full max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4 text-center">Student List</h1>

        <table class="w-full border border-gray-300 text-sm text-left">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">tanggal lahir</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Class</th>
                    <th class="border px-4 py-2">Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border px-4 py-2">{{ $student['name'] }}</td>
                    <td class="border px-4 py-2">{{ $student['birthdate'] }}</td>
                    <td class="border px-4 py-2">{{ $student->classroom->name }}</td>
                    <td class="border px-4 py-2">{{ $student['email'] }}</td>
                    <td class="border px-4 py-2">{{ $student['address'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>