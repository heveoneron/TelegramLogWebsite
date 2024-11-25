<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Input Data AddOn List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black">
                    <form action="{{ route('business_partners.store') }}" method="POST">
                        @csrf

                        <!-- Business Partners Name -->
                        <div class="form-group mb-6">
                            <label for="bp_name" class="block text-black font-medium">Business Partners Name</label>
                            <input type="text" name="bp_name" id="bp_name" class="form-control mt-1 border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2 w-full" required>
                        </div>

                        <!-- Address -->
                        <div class="form-group mb-6">
                            <label for="address" class="block text-black font-medium">Address</label>
                            <input type="text" name="address" id="address" class="form-control mt-1 border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2 w-full" required>
                        </div>

                        <!-- Telegram Token -->
                        <div class="form-group mb-6">
                            <label for="telegram_token" class="block text-black font-medium">Telegram Token</label>
                            <input type="text" name="telegram_token" id="telegram_token" class="form-control mt-1 border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2 w-full" required>
                        </div>

                        <button type="submit" class="btn btn-primary py-2 px-4 bg-indigo-600 text-white rounded hover:bg-indigo-700">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
