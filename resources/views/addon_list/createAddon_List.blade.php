<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Input Data AddOn List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('addon_list.store') }}" method="POST">
                        @csrf

                        <div class="bg-white p-8 rounded-lg shadow-md">
                            <h3 class="text-2xl font-semibold mb-4 text-black">Input Data AddOn List</h3>

                            <!-- Addon Name -->
                            <div class="form-group mb-6">
                                <label for="addon_name" class="block text-lg font-medium text-black mb-2">Addon Name</label>
                                <input type="text" name="addon_name" id="addon_name" class="form-control w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn-primary py-2 px-6 rounded-lg">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    /* Set the background color and text to black */
    body {
        background-color: #f9fafb;
        color: black;
    }

    /* Style the form background */
    .form-group input {
        background-color: white;
        color: black;
    }

    /* Style the form container */
    .bg-white {
        background-color: #ffffff;
    }

    .form-control {
        font-size: 16px;
        border-radius: 8px;
    }

    /* Button style */
    .btn-primary {
        background-color: #2563eb;
        color: white;
        font-size: 16px;
        padding: 10px 20px;
        border-radius: 8px;
        transition: background-color 0.2s;
        width: auto; /* Remove w-full to make the button auto-sized */
        display: inline-block; /* Make the button inline-block */
    }

    .btn-primary:hover {
        background-color: #1e40af;
    }

    /* Add some margin to the form */
    .p-8 {
        padding: 32px;
    }

    .rounded-lg {
        border-radius: 10px;
    }
</style>
