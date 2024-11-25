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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Figtree', sans-serif;
                background-color: #f3f4f6; /* Light gray background */
                color: #000000; /* Black text color */
            }

            .min-h-screen {
                background-color: #f9fafb; /* Light background for the container */
            }

            .bg-white {
                background-color: #ffffff; /* White background for content area */
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            }

            .dark:bg-gray-800 {
                background-color: #333333; /* Dark background for dark mode */
            }

            .text-gray-900 {
                color: #000000; /* Ensuring text is black */
            }

            .font-sans {
                font-family: 'Figtree', sans-serif;
            }

            .shadow-md {
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Slight shadow around the content */
            }

            .min-h-screen.flex {
                display: flex;
                justify-content: center;
                align-items: center;
                padding-top: 50px;
            }

            .sm:max-w-md {
                max-width: 28rem; /* Maximum width of the content */
                margin: 0 auto;
            }

            .w-full {
                width: 100%;
            }

            .sm:rounded-lg {
                border-radius: 8px; /* Rounded corners */
            }

            .px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }

            .py-4 {
                padding-top: 1rem;
                padding-bottom: 1rem;
            }

            .text-center {
                text-align: center;
            }

            a {
                color: inherit;
                text-decoration: none;
                display: inline-block;
            }

            a:hover {
                text-decoration: underline;
            }

            .w-20.h-20 {
                width: 5rem;
                height: 5rem;
            }

            .fill-current {
                fill: currentColor;
            }

            .text-gray-500 {
                color: #6b7280; /* Light gray color for logo */
            }
        </style>
    </head>
    <body>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="text-center mb-4">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
