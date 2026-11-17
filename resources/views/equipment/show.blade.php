@extends('layouts.inventory')

@section('title', 'Equipment Details')

@section('heading', 'Equipment Details')

@section('content')

    <div class="max-w-3xl bg-white dark:bg-white-800 shadow rounded-lg p-6">

        <div class="flex justify-between items-center mb-6">

            <h3 class="text-lg font-semibold text-gray-800 dark:text-black">
                {{ $equipment->equipment_name }}
            </h3>

            <span class="px-3 py-1 rounded text-sm
                {{ $equipment->availability_status === 'available'
                    ? 'bg-green-100 text-green-800'
                    : 'bg-red-100 text-red-800' }}">

                {{ ucfirst($equipment->availability_status) }}

            </span>

        </div>

        <!-- Equipment Information -->
        <div class="space-y-4">

            <div>
                <p class="text-sm text-gray-500">Equipment ID</p>
                <p class="font-medium">{{ $equipment->id }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Equipment Name</p>
                <p class="font-medium">{{ $equipment->equipment_name }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Category</p>
                <p class="font-medium capitalize">{{ $equipment->category }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Unit Price</p>
                <p class="font-medium">
                    ₱{{ number_format($equipment->unit_price, 2) }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Description</p>
                <p class="font-medium whitespace-pre-line">
                    {{ $equipment->description }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Availability Status</p>
                <p class="font-medium capitalize">
                    {{ $equipment->availability_status }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Date Created</p>
                <p class="font-medium">
                    {{ $equipment->created_at->format('F d, Y h:i A') }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Last Updated</p>
                <p class="font-medium">
                    {{ $equipment->updated_at->format('F d, Y h:i A') }}
                </p>
            </div>

        </div>

        <!-- Page Actions -->
        <div class="flex gap-3 mt-8">

            <a href="{{ route('equipment.edit', $equipment) }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded">
                Edit Equipment
            </a>

            <a href="{{ route('equipment.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded">
                Back to Inventory
            </a>

        </div>

    </div>

@endsection
