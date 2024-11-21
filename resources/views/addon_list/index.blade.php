<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Addon List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{ __("You're logged in!") }} --}}
                    <h1>Addon Logs</h1>
                    <a href="{{ route('addon_list.create') }}" class="btn btn-primary mb-3">Tambah Data Addon</a>

                    <table id="addon-table" class="display">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>AddOn Name</th>
                            </tr>
                        </thead>
                    </table>

                    <script>

                        $(document).ready(function () {
                            //alert("test");
                            $('#addon-table').DataTable({
                                processing: true,
                                serverSide: true,
                                ajax: {
                                    url:'{{ route("addon_list.data") }}',
                                    type: 'GET',
                                    error: function(xhr, error, code) {
                                        console.log('Error:', error); // Untuk debugging
                                        $('#addon-table').html('<p class="text-center">Data tidak ditemukan atau terjadi kesalahan.</p>');
                                    }
                                },
                                columns: [
                                    { data: 'addon_id', name: 'addon_id' },
                                    { data: 'addon_name', name: 'addon_name' },
                                ]
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Logs</title>
    <!-- Include jQuery and DataTables CSS/JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
</head>
<body>

</body>
</html> --}}
