@extends('layouts.inventory')

@section('title', 'Add Equipment')

@section('heading', 'Add New Equipment')

@section('content')

    <div class="max-w-3xl bg-white dark:bg-gray-800 shadow rounded-lg p-6">

        <form action="{{ route('equipment.store') }}" method="POST">

            @csrf

            <!-- Equipment Name -->
            <div class="mb-4">
                <label for="equipment_name" class="block mb-2 font-medium text-gray-700 dark:text-white">
                    Equipment Name
                </label>

                <input
                    type="text"
                    name="equipment_name"
                    id="equipment_name"
                    value="{{ old('equipment_name') }}"
                    class="w-full rounded border-gray-300 dark:bg-white-700"
                    required
                >

                @error('equipment_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category -->
            <div class="mb-4">
                <label for="category" class="block mb-2 font-medium text-gray-700 dark:text-white">
                    Category
                </label>

                <select
                    name="category"
                    id="category"
                    class="w-full rounded border-gray-300 dark:bg-white-700"
                    required
                >
                    <option value="">Select Category</option>

                    @foreach (['paddles', 'balls', 'nets', 'accessories'] as $category)
                        <option value="{{ $category }}"
                            {{ old('category') == $category ? 'selected' : '' }}>
                            {{ ucfirst($category) }}
                        </option>
                    @endforeach

                </select>

                @error('category')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Unit Price -->
            <div class="mb-4">
                <label for="unit_price" class="block mb-2 font-medium text-gray-700 dark:text-white">
                    Unit Price (₱)
                </label>

                <input
                    type="number"
                    name="unit_price"
                    id="unit_price"
                    value="{{ old('unit_price') }}"
                    min="0"
                    step="0.01"
                    class="w-full rounded border-gray-300 dark:bg-white-700"
                    required
                >

                @error('unit_price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block mb-2 font-medium text-gray-700 dark:text-white">
                    Description
                </label>

                <textarea
                    name="description"
                    id="description"
                    rows="4"
                    class="w-full rounded border-gray-300 dark:bg-white-700"
                    required
                >{{ old('description') }}</textarea>

                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Availability Status -->
            <div class="mb-6">
                <label for="availability_status" class="block mb-2 font-medium text-gray-700 dark:text-white">
                    Availability Status
                </label>

                <select
                    name="availability_status"
                    id="availability_status"
                    class="w-full rounded border-gray-300 dark:bg-white-700"
                    required
                >
                    <option value="">Select Status</option>

                    @foreach (['available', 'unavailable'] as $status)
                        <option value="{{ $status }}"
                            {{ old('availability_status') == $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach

                </select>

                @error('availability_status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Form Actions -->
            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded"
                >
                    Save Equipment
                </button>

                <a
                    href="{{ route('equipment.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

@endsection
