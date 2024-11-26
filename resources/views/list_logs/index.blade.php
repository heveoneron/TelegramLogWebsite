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
                    <h1 class="text-3xl font-semibold mb-4">Log List</h1>
                    <a href="{{ route('list-logs.create') }}"
                        class="btn btn-primary mb-4 inline-block bg-blue-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200">
                        Tambah Data Log
                    </a>

                    <!-- Styling untuk tabel -->
                    <table id="logs-table" class="display table-auto w-full border-separate border-spacing-0.5">
                        <thead class="bg-gray-200 dark:bg-gray-700">
                            <tr>
                                <th class="p-3 text-left text-sm font-medium text-gray-800 dark:text-gray-200">ID</th>
                                <th class="p-3 text-left text-sm font-medium text-gray-800 dark:text-gray-200">AddOn
                                    Name</th>
                                <th class="p-3 text-left text-sm font-medium text-gray-800 dark:text-gray-200">Business
                                    Partner Name</th>
                                <th class="p-3 text-left text-sm font-medium text-gray-800 dark:text-gray-200">
                                    Description</th>
                                <th class="p-3 text-left text-sm font-medium text-gray-800 dark:text-gray-200">Date</th>
                                <th class="p-3 text-left text-sm font-medium text-gray-800 dark:text-gray-200">Status
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <!-- Data akan diisi oleh DataTables -->
                        </tbody>
                    </table>

                    <script>
                        $(document).ready(function() {
                            $('#logs-table').DataTable({
                                processing: true,
                                serverSide: true,
                                ajax: {
                                    url: '{{ route('list-logs.data') }}',
                                    type: 'GET',
                                    error: function(xhr, error, code) {
                                        console.log('Error:', error);
                                        $('#logs-table').html(
                                            '<p class="text-center">Data tidak ditemukan atau terjadi kesalahan.</p>'
                                        );
                                    }
                                },
                                columns: [{
                                        data: 'id',
                                        name: 'id'
                                    },
                                    {
                                        data: 'addon_name',
                                        name: 'addon_name'
                                    },
                                    {
                                        data: 'bp_name',
                                        name: 'bp_name'
                                    },
                                    {
                                        data: 'description',
                                        name: 'description'
                                    },
                                    {
                                        data: 'date',
                                        name: 'date'
                                    },
                                    {
                                        data: 'status',
                                        name: 'status',
                                        orderable: false
                                    } // Disable sorting for 'status'
                                ],
                                pageLength: 10, // Jumlah data per halaman
                                lengthMenu: [10, 25, 50, 100], // Opsi jumlah data per halaman
                                order: [
                                    [4, 'asc']
                                ], // Default sorting by 'date' column
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>

    <!-- Menambahkan CSS untuk merapikan tampilan dan mengubah warna teks menjadi hitam -->
    <style>
        body,
        .text-gray-900,
        .dark\:text-gray-100,
        .text-gray-800,
        .dark\:text-gray-200 {
            color: black !important;
        }

        /* Styling untuk tabel */
        #logs-table {
            border-collapse: collapse;
            width: 100%;
        }

        #logs-table th,
        #logs-table td {
            padding: 12px;
            border: 1px solid #e5e7eb;
            text-align: left;
        }

        #logs-table thead {
            background-color: #f3f4f6;
        }

        #logs-table tbody tr:nth-child(even) {
            background-color: #f9fafb;
        }

        /* Styling untuk tombol */
        .btn-primary {
            background-color: #2563eb;
            color: white;
            border-radius: 8px;
            font-size: 16px;
            padding: 10px 20px;
        }

        .btn-primary:hover {
            background-color: #1e40af;
        }

        /* Responsivitas */
        @media (max-width: 768px) {

            #logs-table th,
            #logs-table td {
                padding: 8px;
            }
        }
    </style>
</x-app-layout>
