<!-- resources/views/dashboard/reports.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-red-800 dark:text-blue-300 leading-tight">
            {{ __('Reports') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Reports</h1>
                <p class="text-gray-600 dark:text-gray-300">This is the Reports page.</p>
            </div>
        </div>
    </div>
</x-app-layout>
