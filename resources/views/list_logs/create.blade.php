<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Input Data Log') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{ __("You're logged in!") }} --}}
                    <form action="{{ route('list-logs.store') }}" method="POST">
                        @csrf
                        <!-- AddOn -->
                        <div class="form-group">
                            <label for="addon_id">AddOn</label>
                            <select name="addon_id" id="addon_id" class="form-control">
                                <option value="">-- Select AddOn --</option>
                                @foreach($addons as $addon)
                                    <option value="{{ $addon->addon_id }}">{{ $addon->addon_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Business Partner -->
                        <div class="form-group">
                            <label for="bp_code">Business Partner</label>
                            <select name="bp_code" id="bp_code" class="form-control">
                                <option value="">-- Select Business Partner --</option>
                                @foreach($businessPartners as $partner)
                                    <option value="{{ $partner->bp_code }}">{{ $partner->bp_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" id="description" class="form-control" required>
                        </div>

                        <!-- Date -->
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" name="date" id="date" class="form-control" required>
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" name="status" id="status" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
            </div>
        </div>
    </div>
</x-app-layout>

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Log</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Input Data Log</h1>
        <form action="{{ route('list-logs.store') }}" method="POST">
            @csrf

            <!-- AddOn -->
            <div class="form-group">
                <label for="addon_id">AddOn</label>
                <select name="addon_id" id="addon_id" class="form-control">
                    <option value="">-- Select AddOn --</option>
                    @foreach($addons as $addon)
                        <option value="{{ $addon->addon_id }}">{{ $addon->addon_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Business Partner -->
            <div class="form-group">
                <label for="bp_code">Business Partner</label>
                <select name="bp_code" id="bp_code" class="form-control">
                    <option value="">-- Select Business Partner --</option>
                    @foreach($businessPartners as $partner)
                        <option value="{{ $partner->bp_code }}">{{ $partner->bp_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control" required>
            </div>

            <!-- Date -->
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <!-- Status -->
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" name="status" id="status" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>
</html> --}}
