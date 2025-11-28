<div id="editTeacherModal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center bg-black/50">
    
    <div class="relative p-4 w-full max-w-md">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

            {{-- Header --}}
            <div class="flex items-center justify-between p-4 border-b dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Edit Teacher</h3>
                <button type="button"
                    onclick="document.getElementById('editTeacherModal').classList.add('hidden')"
                    class="text-gray-400 hover:text-gray-900 rounded-lg text-sm w-8 h-8">
                    ✕
                </button>
            </div>

            <form id="editTeacherForm" action="{{ route('admin.teacher.update', 0) }}" method="POST"
                class="p-6 space-y-4">
                @csrf
                @method('PUT')

                <input type="hidden" id="t_id" name="id">

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input type="text" id="t_name" name="name" required
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 
                                  dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" id="t_email" name="email" required 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 
                               dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No HP</label>
                    <input type="text" id="t_phone" name="phone" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 
                               dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <input type="text" id="t_address" name="address" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 
                               dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mapel</label>
                    <select id="t_subject" name="subject_id" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 
                               dark:bg-gray-600 dark:border-gray-500 dark:text-white">

                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button"
                        onclick="document.getElementById('editTeacherModal').classList.add('hidden')"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg">
                        Batal
                    </button>

                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                        Update
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
function openEditModal(id) {
    fetch(`/admin/teacher/${id}/edit`)
        .then(res => res.json())
        .then(data => {
            document.getElementById('t_id').value = data.id;
            document.getElementById('t_name').value = data.name;
            document.getElementById('t_email').value = data.email;
            document.getElementById('t_phone').value = data.phone;
            document.getElementById('t_address').value = data.address;
            document.getElementById('t_subject').value = data.subject_id;

            document.getElementById('editTeacherForm').action = `/admin/teacher/${id}`;
            document.getElementById('editTeacherModal').classList.remove('hidden');
        });
}
</script>
