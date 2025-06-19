<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employee List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">All Employees</h3>

                    <table class="min-w-full border text-sm text-left">
                        <thead>
                            <tr class="bg-gray-200 dark:bg-gray-700">
                                <th class="p-2 border">ID</th>
                                <th class="p-2 border">First Name</th>
                                <th class="p-2 border">Last Name</th>
                                <th class="p-2 border">Gender</th>
                                <th class="p-2 border">Date of Birth</th>
                                <th class="p-2 border">Salary</th>
                                <th class="p-2 border">Created At</th>
                                <th class="p-2 border">Utility</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employees as $employee)
                                <tr x-data = "{ openEditModal: false }" class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="p-2 border">{{ $employee->id }}</td>
                                    <td class="p-2 border">{{ $employee->first_name }}</td>
                                    <td class="p-2 border">{{ $employee->last_name }}</td>
                                    <td class="p-2 border">{{ $employee->gender }}</td>
                                    <td class="p-2 border">{{ $employee->date_of_birth }}</td>
                                    <td class="p-2 border">{{ $employee->salary }}</td>
                                    <td class="p-2 border">{{ $employee->created_at->format('Y-m-d') }}</td>
                                    <td class="p-2 border">
                                        <button @click = "openEditModal = true" class="text-blue-600 hover:text-blue-800">Edit</button>
                                        <form method="POST" action="{{ route('employees.delete', $employee->id) }}" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 ml-2">Delete</button>
                                        </form>

                                        @include('components.edit-employee-modal', ['employee' => $employee])
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="p-2 border text-center">No records found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
