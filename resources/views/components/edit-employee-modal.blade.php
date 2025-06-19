<div 
    x-show="openEditModal"
    x-cloak
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
>
    <div 
        @click.away="openEditModal = false"
        class="bg-white dark:bg-gray-900 p-6 rounded shadow-lg w-full max-w-md"
    >
        <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Add New Employee</h3>

        <form method="post" action="{{ route('employees.update', $employee->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">First name</label>
                <input 
                    type="text" 
                    name="first_name" 
                    value="{{ $employee->first_name }}" 
                    class="w-full px-3 py-2 border rounded 
                        bg-white text-gray-900 border-gray-300 
                        dark:bg-gray-800 dark:text-gray-100 dark:border-gray-600" 
                    required
                >
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Last Name</label>
                <input 
                    type="text" 
                    name="last_name" 
                    value="{{ $employee->last_name }}" 
                    class="w-full px-3 py-2 border rounded 
                        bg-white text-gray-900 border-gray-300 
                        dark:bg-gray-800 dark:text-gray-100 dark:border-gray-600" 
                    required
                >
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Gender</label>
                <select 
                    name="gender" 
                    class="w-full px-3 py-2 border rounded 
                        bg-white text-gray-900 border-gray-300 
                        dark:bg-gray-800 dark:text-gray-100 dark:border-gray-600"
                    required
                >
                    <option value="{{ $employee->gender }}" disabled selected>{{ $employee->gender }}</option>

                    @if ($employee->gender !== 'Male')
                        <option value="Male">Male</option>
                    @endif

                    @if ($employee->gender !== 'Female')
                        <option value="Female">Female</option>
                    @endif
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Birthday</label>
                <input 
                    type="date" 
                    name="date_of_birth" 
                    value="{{ $employee->date_of_birth }}" 
                    class="w-full px-3 py-2 border rounded 
                        bg-white text-gray-900 border-gray-300 
                        dark:bg-gray-800 dark:text-gray-100 dark:border-gray-600" 
                    required
                >
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Monthly Salary</label>
                <input 
                    type="number" 
                    name="salary" 
                    value="{{ $employee->salary }}" 
                    class="w-full px-3 py-2 border rounded 
                        bg-white text-gray-900 border-gray-300 
                        dark:bg-gray-800 dark:text-gray-100 dark:border-gray-600" 
                    required
                >
            </div>

            <div class="flex justify-end">
                <button type="button" @click="openEditModal = false" class="mr-2 px-4 py-2 bg-red-600 hover:bg-red-700 rounded">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
