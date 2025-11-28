<div id="updateSubjectroomModal-{{ $sub->id }}" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black/50">
    <div class="relative p-4 w-full max-w-md">
        <div class="bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 border-b dark:border-gray-600">
                <h3 class="text-lg font-semibold">Update Subject</h3>
                <button data-modal-hide="updateSubjectroomModal-{{ $sub->id }}"
                    class="text-gray-400 hover:text-gray-900">✕</button>
            </div>

            <form action="{{ route('admin.subject.update', $sub->id) }}" method="POST" class="p-6 space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block mb-2 text-sm">Nama Subject</label>
                    <input type="text" name="name" value="{{ $sub->name }}" required
                        class="w-full p-2.5 rounded-lg bg-gray-50 border dark:bg-gray-600 dark:border-gray-500">
                </div>

                <div>
                    <label class="block mb-2 text-sm">Description</label>
                    <input type="text" name="description" value="{{ $sub->description }}" required
                        class="w-full p-2.5 rounded-lg bg-gray-50 border dark:bg-gray-600 dark:border-gray-500">
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" data-modal-hide="updateSubjectroomModal-{{ $sub->id }}"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-700 text-white rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
