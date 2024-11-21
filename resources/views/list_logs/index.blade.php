<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Log') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{ __("You're logged in!") }} --}}
                    <h1>List Logs</h1>
                    <a href="{{ route('list-logs.create') }}" class="btn btn-primary mb-3">Tambah Data Log</a>

                    <table id="logs-table" class="display">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>AddOn Name</th>
                                <th>Business Partner Name</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>

                    <script>

                        $(document).ready(function () {
                            //alert("test");
                            $('#logs-table').DataTable({
                                processing: false,
                                serverSide: true,
                                ajax:
                                {
                                    url:'{{ route("list-logs.data") }}',
                                    type: 'GET',
                                    error: function(xhr, error, code) {
                                        console.log('Error:', error); // Untuk debugging
                                        $('#addon-table').html('<p class="text-center">Data tidak ditemukan atau terjadi kesalahan.</p>');
                                    }
                                },
                                columns: [
                                    { data: 'id', name: 'id' },
                                    { data: 'addon_id', name: 'addon_id' },
                                    { data: 'bp_code', name: 'bp_code' },
                                    { data: 'description', name: 'description' },
                                    { data: 'date', name: 'date' },
                                    { data: 'status', name: 'status' },
                                ]
                            });
                        });
                    </script>
            </div>
        </div>
    </div>
</x-app-layout>

