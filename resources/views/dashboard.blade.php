<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Button to add new Employee -->
                    <div x-data="{ openModal: false }">
                        <div class="mt-4" >
                            <button
                                @click="openModal = true"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            >
                                {{ __('Add New Employee') }}
                            </button>
                        </div>
                        
                        @include('components.add-employee-modal')
                    </div>
                </div>
            </div>
            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Male Employees -->
                <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-4">
                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        Total Male Employees
                    </h4>
                    <div class="mt-2 text-2xl font-semibold text-gray-800 dark:text-white">
                        {{ $totalMaleEmployees }}
                    </div>
                </div>

                <!-- Total Female Employees -->
                <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-4">
                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        Total Female Employees
                    </h4>
                    <div class="mt-2 text-2xl font-semibold text-gray-800 dark:text-white">
                        {{ $totalFemaleEmployees }}
                    </div>
                </div>

                <!-- Average Age -->
                <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-4">
                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        Average Age of Employees
                    </h4>
                    <div class="mt-2 text-2xl font-semibold text-gray-800 dark:text-white">
                        {{ number_format($avgAge, 2) }} yrs
                    </div>
                </div>

                <!-- Total Salary -->
                <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-4">
                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        Total Salary of All Employees
                    </h4>
                    <div class="mt-2 text-2xl font-semibold text-gray-800 dark:text-white">
                        ₱{{ number_format($totalSalaries, 2) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>
