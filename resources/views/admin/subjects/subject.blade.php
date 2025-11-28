<x-admin.layout :title="$title">

    {{-- Header --}}
    <div class="flex justify-between items-center mt-10 mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Subject List</h1>

        <button 
            data-modal-target="addSubjectModal" 
            data-modal-toggle="addSubjectModal"
            class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">
            + Add Subject
        </button>

    </div>

      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Nama Subject</th>
                    <th class="px-6 py-3">Description</th>
                    <th class="px-6 py-3">Guru Pengampu</th>
                    <th class="px-6 py-3">Created At</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($subject as $i => $sub)
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $i + 1 }}</td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $sub->name }}
                        </td>

                        <td class="px-6 py-4">{{ $sub->description }}</td>

                        <td class="px-6 py-4">
                            @if ($sub->teacher)
                                <li>{{ $sub->teacher->name }}</li>
                            @else
                                <li class="text-gray-500 italic">Belum ada guru pengampu</li>
                            @endif
                        </td>

                        <td class="px-6 py-4">{{ $sub->created_at }}</td>

                        <td class="px-6 py-4">
                            <button 
                                data-modal-target="updateSubjectroomModal-{{ $sub->id }}"
                                data-modal-toggle="updateSubjectroomModal-{{ $sub->id }}"
                                class="px-3 py-1 text-yellow-600 border border-yellow-600 rounded-lg text-xs hover:bg-yellow-600 hover:text-white transition">
                                Edit
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">Belum ada data subject.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Modal Add --}}
    @include('admin.subjects.create')

    {{-- Modal Update --}}
    @foreach ($subject as $sub)
        @include('admin.subjects.edit', ['sub' => $sub])
    @endforeach

</x-admin.layout>
