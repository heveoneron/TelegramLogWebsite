<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Update Profile Section -->
            <div class="p-6 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Update Profile Information</h3>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password Section -->
            <div class="p-6 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Update Password</h3>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account Section -->
            <div class="p-6 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Delete Account</h3>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

    <!-- Add custom styles to improve the design -->
    <style>
        /* Ensure black text across the page */
        body, .text-gray-900, .dark\:text-gray-100, .text-gray-800, .dark\:text-gray-200 {
            color: black !important;
        }

        /* Add padding and margin for sections */
        .bg-white {
            background-color: #ffffff;
        }

        .p-6 {
            padding: 24px;
        }

        .sm\:p-8 {
            padding: 32px;
        }

        /* Section header styling */
        h3 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 16px;
        }

        /* Buttons and inputs */
        input, button {
            color: black !important;
        }

        /* Add subtle hover effect for sections */
        .bg-white:hover {
            background-color: #f7f7f7;
            transition: background-color 0.3s ease;
        }

        /* Styling for shadow effect */
        .shadow {
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
        }

        .sm\:rounded-lg {
            border-radius: 8px;
        }

        /* Make sure there is space between sections */
        .space-y-8 > *:not(:last-child) {
            margin-bottom: 32px;
        }

        /* Form inputs and buttons */
        input[type="text"], input[type="email"], input[type="password"], textarea {
            background-color: #f9fafb;
            border: 1px solid #e5e7eb;
            padding: 10px;
            width: 100%;
            border-radius: 8px;
        }

        /* Form submit button */
        button[type="submit"] {
            background-color: #2563eb;
            color: white;
            border-radius: 8px;
            font-size: 16px;
            padding: 10px 20px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #1e40af;
        }
    </style>
</x-app-layout>
