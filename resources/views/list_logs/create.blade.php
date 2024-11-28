<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Input Data Log') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black dark:text-gray-100">
                    <form action="{{ route('list-logs.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- AddOn -->
                        <div class="form-group">
                            <label for="addon_id" class="block text-sm font-medium text-gray-700">AddOn</label>
                            <select name="addon_id" id="addon_id" class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">-- Select AddOn --</option>
                                @foreach($addons as $addon)
                                    <option value="{{ $addon->addon_id }}">{{ $addon->addon_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Business Partner -->
                        <div class="form-group">
                            <label for="bp_code" class="block text-sm font-medium text-gray-700">Business Partner</label>
                            <select name="bp_code" id="bp_code" class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">-- Select Business Partner --</option>
                                @foreach($businessPartners as $partner)
                                    <option value="{{ $partner->bp_code }}">{{ $partner->bp_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <input type="text" name="description" id="description" class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <!-- Date -->
                        <div class="form-group">
                            <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                            <input type="date" name="date" id="date" class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <input type="text" name="status" id="status" class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-200 ease-in-out">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
