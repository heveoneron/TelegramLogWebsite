<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- DataTables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

        <!-- jQuery and DataTables JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

        <!-- Custom Styles -->
        <style>
            body {
                font-family: 'Figtree', sans-serif;
                color: black !important;
                background-color: #f9fafb;
            }

            .min-h-screen {
                background-color: #f9fafb;
            }

            .bg-gray-100 {
                background-color: #f9fafb;
            }

            .dark\:bg-gray-900 {
                background-color: #111827;
            }

            .bg-white {
                background-color: #ffffff;
            }

            .dark\:bg-gray-800 {
                background-color: #1f2937;
            }

            .font-sans {
                font-family: 'Figtree', sans-serif;
            }

            .text-black {
                color: black;
            }

            .table th, .table td {
                padding: 12px;
                text-align: left;
                vertical-align: middle;
            }

            .table thead {
                background-color: #f3f4f6;
                font-weight: 600;
            }

            .table tbody tr:hover {
                background-color: #f1f5f9;
            }

            .table-bordered th, .table-bordered td {
                border: 1px solid #e5e7eb;
            }

            .btn-primary {
                background-color: #2563eb;
                color: white;
                border-radius: 8px;
                font-size: 16px;
                padding: 10px 20px;
                transition: background-color 0.3s;
            }

            .btn-primary:hover {
                background-color: #1e40af;
            }

            header {
                background-color: #ffffff;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .max-w-7xl {
                max-width: 7xl;
                margin: 0 auto;
            }

            .py-6 {
                padding-top: 1.5rem;
                padding-bottom: 1.5rem;
            }

            .sm\:px-6, .lg\:px-8 {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }

            .mb-3 {
                margin-bottom: 1rem;
            }
        </style>
    </head>
    <body class="font-sans antialiased">

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

    </body>
</html>
