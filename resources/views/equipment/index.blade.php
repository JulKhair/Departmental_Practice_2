@extends('layouts.inventory')

@section('title', 'Equipment Inventory')

@section('heading', 'Equipment Inventory')

@section('content')

    <!-- Inventory Header -->
    <div class="flex justify-between items-center mb-6">

        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                Equipment Records
            </h3>

            <p class="text-sm text-gray-500">
                Manage all registered pickleball equipment.
            </p>
        </div>

        <a href="{{ route('equipment.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            + Add Equipment
        </a>

    </div>

    <!-- Equipment Table -->
    <div class="bg-white dark:bg-white-800 shadow rounded-lg overflow-hidden">

        <table class="w-full text-left">

            <thead class="bg-gray-200 dark:bg-white-700">
                <tr>
                    <th class="px-6 py-3">Equipment Name</th>
                    <th class="px-6 py-3">Category</th>
                    <th class="px-6 py-3">Unit Price</th>
                    <th class="px-6 py-3">Availability</th>
                    <th class="px-6 py-3">Actions</th>
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

                        <td class="px-6 py-4">
                            <div class="flex gap-3">

                                <a href="{{ route('equipment.show', $item) }}"
                                   class="text-blue-600 hover:underline">
                                    View
                                </a>

                                <a href="{{ route('equipment.edit', $item) }}"
                                   class="text-yellow-600 hover:underline">
                                    Edit
                                </a>

                                <form action="{{ route('equipment.destroy', $item) }}"
                                      method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this equipment?');">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="text-red-600 hover:underline">
                                        Delete
                                    </button>

                                </form>

                            </div>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                            No equipment records found.
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
