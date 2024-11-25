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
                    <h1 class="text-3xl font-semibold mb-4">Addon Logs</h1>
                    <a href="{{ route('addon_list.create') }}" class="btn-primary mb-3 inline-block bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-200">Tambah Data Addon</a>

                    <!-- Table with border, hover effect, and better spacing -->
                    <table id="addon-table" class="display table-auto w-full border-separate border-spacing-0.5 mt-4">
                        <thead class="bg-gray-200 dark:bg-gray-700">
                            <tr>
                                <th class="p-3 text-left text-sm font-medium text-gray-800 dark:text-gray-200">ID</th>
                                <th class="p-3 text-left text-sm font-medium text-gray-800 dark:text-gray-200">AddOn Name</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <!-- Data will be populated with DataTables -->
                        </tbody>
                    </table>

                    <script>
                        $(document).ready(function () {
                            $('#addon-table').DataTable({
                                processing: true,
                                serverSide: true,
                                ajax: {
                                    url: '{{ route("addon_list.data") }}',
                                    type: 'GET',
                                    error: function (xhr, error, code) {
                                        console.log('Error:', error); // For debugging
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

    <style>
        /* Ensure black text for better readability */
        body, .text-gray-900, .dark\:text-gray-100, .text-gray-800, .dark\:text-gray-200 {
            color: black !important;
        }

        /* Table styles */
        #addon-table {
            border-collapse: collapse;
            width: 100%;
        }
        #addon-table th, #addon-table td {
            padding: 12px;
            border: 1px solid #e5e7eb;
            text-align: left;
        }
        #addon-table thead {
            background-color: #f3f4f6;
        }
        #addon-table tbody tr:hover {
            background-color: #f1f5f9;
        }
        #addon-table tbody tr:nth-child(even) {
            background-color: #f9fafb;
        }

        /* Styling for the Addon Add Button */
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

        /* Ensure responsiveness */
        @media (max-width: 768px) {
            #addon-table th, #addon-table td {
                padding: 8px;
            }
        }

        /* Section spacing for a cleaner design */
        .p-6 {
            padding: 24px;
        }

        /* Add hover effect for tables */
        #addon-table tbody tr:hover {
            background-color: #e5e7eb;
            transition: background-color 0.3s ease;
        }

        /* Make button and table more visually appealing */
        .text-3xl {
            font-size: 1.875rem;
            font-weight: 600;
        }

        .mb-4 {
            margin-bottom: 16px;
        }
    </style>
</x-app-layout>
