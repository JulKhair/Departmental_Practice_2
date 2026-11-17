<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Equipment Management System')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">

    <div class="min-h-screen">

        <!-- Navigation -->
        <nav class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">

                <h1 class="text-xl font-bold text-gray-800 dark:text-white">
                    Pickleball Equipment Management System
                </h1>

                <div class="flex items-center gap-6">

                    <a href="{{ route('dashboard') }}"
                    class="text-gray-700 dark:text-gray-200 hover:text-blue-600">
                        Dashboard
                    </a>

                    <a href="{{ route('equipment.index') }}"
                    class="text-gray-700 dark:text-gray-200 hover:text-blue-600">
                        Inventory
                    </a>

                    <a href="{{ route('reports.index') }}"
                    class="text-gray-700 dark:text-gray-200 hover:text-blue-600">
                        Reports
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit">
                            Logout
                        </button>
                    </form>

                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        <header class="bg-white dark:bg-gray-800 shadow mt-4">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
                    @yield('heading')
                </h2>
            </div>
        </header>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')

        </main>

    </div>

</body>
</html>
