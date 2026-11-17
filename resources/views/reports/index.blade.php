@extends('layouts.inventory')

@section('title', 'Equipment Reports')

@section('heading', 'Equipment Reports')

@section('content')

    <!-- Report Description -->
    <div class="mb-6">
        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
            Inventory Reports
        </h3>

        <p class="text-sm text-gray-500">
            View and filter registered pickleball equipment.
        </p>
    </div>

    <!-- Export Actions -->
    <div class="flex flex-wrap gap-3 mb-6">

    <!-- Export PDF -->
    <a href="{{ route('reports.export.pdf', request()->query()) }}"
       class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded">
        Export PDF
    </a>

    <!-- Export CSV -->
    <a href="{{ route('reports.export.csv', request()->query()) }}"
       class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded">
        Export CSV
    </a>

    </div>

    <!-- Filter Section -->
    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 mb-6">

        <form action="{{ route('reports.index') }}" method="GET">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <!-- Category Filter -->
                <div>
                    <label for="category" class="block mb-2 font-medium text-gray-700 dark:text-white">
                        Category
                    </label>

                    <select name="category" id="category"
                            class="w-full rounded border-gray-300 dark:bg-white-700">

                        <option value="">All Categories</option>

                        @foreach (['paddles', 'balls', 'nets', 'accessories'] as $category)
                            <option value="{{ $category }}"
                                {{ request('category') == $category ? 'selected' : '' }}>
                                {{ ucfirst($category) }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <!-- Availability Filter -->
                <div>
                    <label for="availability_status" class="block mb-2 font-medium text-gray-700 dark:text-white">
                        Availability
                    </label>

                    <select name="availability_status" id="availability_status"
                            class="w-full rounded border-gray-300 dark:bg-white-700">

                        <option value="">All Statuses</option>

                        @foreach (['available', 'unavailable'] as $status)
                            <option value="{{ $status }}"
                                {{ request('availability_status') == $status ? 'selected' : '' }}>
                                {{ ucfirst($status) }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <!-- Filter Actions -->
                <div class="flex items-end gap-2">

                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded">
                        Apply Filters
                    </button>

                    <a href="{{ route('reports.index') }}"
                       class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded">
                        Reset
                    </a>

                </div>

            </div>

        </form>

    </div>

    <!-- Report Results -->
    <div class="bg-white dark:bg-white-800 shadow rounded-lg overflow-hidden">

        <table class="w-full text-left">

            <thead class="bg-gray-200 dark:bg-white-700">
                <tr>
                    <th class="px-6 py-3">Equipment Name</th>
                    <th class="px-6 py-3">Category</th>
                    <th class="px-6 py-3">Unit Price</th>
                    <th class="px-6 py-3">Availability</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($equipment as $item)

                    <tr class="border-t dark:border-gray-700">

                        <td class="px-6 py-4">
                            {{ $item->equipment_name }}
                        </td>

                        <td class="px-6 py-4 capitalize">
                            {{ $item->category }}
                        </td>

                        <td class="px-6 py-4">
                            ₱{{ number_format($item->unit_price, 2) }}
                        </td>

                        <td class="px-6 py-4 capitalize">
                            {{ $item->availability_status }}
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                            No equipment records found for the selected filters.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $equipment->links() }}
    </div>

@endsection
