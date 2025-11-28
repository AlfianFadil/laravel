<x-layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg overflow-hidden mt-5">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NO</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subject Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teachers</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

                @foreach ($subject as $name)
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $loop->iteration }}</td>

                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ $name->name }}
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ $name->description }}
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-700">
                            @foreach ($name->teachers as $teacher)
                                {{ $teacher->name }} <br>
                            @endforeach
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</x-layout>
