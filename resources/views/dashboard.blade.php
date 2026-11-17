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

    <h3 class="text-lg font-semibold mb-4">
        Welcome to the Pickleball Equipment Management System!
    </h3>

    <p class="mb-6">
        Press the button below to get started with managing your pickleball equipment inventory.
    </p>

    <a href="{{ route('equipment.index') }}"
       class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">

        Manage Equipment Inventory

    </a>

</div>
            </div>
        </div>
    </div>
</x-app-layout>
