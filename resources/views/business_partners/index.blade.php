<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Business Partners') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl font-semibold mb-4">Business Partners List</h1>
                    <a href="{{ route('business_partners.create') }}"
                        class="btn btn-primary mb-3 inline-block bg-blue-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-700 transition duration-200">
                        Add New Business Partner
                    </a>

                    <!-- Table with better spacing, hover effect, and readable font -->
                    <table id="bp-table" class="display table-auto w-full border-separate border-spacing-2">
                        <thead class="bg-gray-200 dark:bg-gray-700">
                            <tr>
                                <th class="p-4 text-left text-sm font-medium text-gray-800 dark:text-gray-200">BP Code
                                </th>
                                <th class="p-4 text-left text-sm font-medium text-gray-800 dark:text-gray-200">Business
                                    Partner Name</th>
                                <th class="p-4 text-left text-sm font-medium text-gray-800 dark:text-gray-200">Address
                                </th>
                                <th class="p-4 text-left text-sm font-medium text-gray-800 dark:text-gray-200">Telegram
                                    Token</th>
                                <th class="p-4 text-left text-sm font-medium text-gray-800 dark:text-gray-200">Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <!-- Data will be populated by DataTables -->
                        </tbody>
                    </table>

                    <script>
                        $(document).ready(function() {
                            $('#bp-table').DataTable({
                                processing: true,
                                serverSide: true,
                                ajax: {
                                    url: '{{ route('business_partners.data') }}',
                                    type: 'GET',
                                    error: function(xhr, error, code) {
                                        console.log('Error:', error); // For debugging
                                        $('#bp-table').html(
                                            '<p class="text-center">Data not found or there was an error.</p>');
                                    }
                                },
                                columns: [{
                                        data: 'bp_code',
                                        name: 'bp_code'
                                    },
                                    {
                                        data: 'bp_name',
                                        name: 'bp_name'
                                    },
                                    {
                                        data: 'address',
                                        name: 'address'
                                    },
                                    {
                                        data: 'telegram_token',
                                        name: 'telegram_token'
                                    },
                                    {
                                        data: null,
                                        render: function(data, type, row) {
                                            return `
                                                <a href="{{ url('business_partners') }}/${row.id}/edit" class="btn btn-warning btn-sm text-white rounded-lg px-4 py-2">
                                                    Edit
                                                </a>
                                                <button class="btn btn-danger btn-sm text-white rounded-lg px-4 py-2" onclick="deletePartner(${row.id})">
                                                    Delete
                                                </button>
                                            `;
                                        },
                                        orderable: false,
                                        searchable: false
                                    }
                                ]
                            });
                        });

                        function deletePartner(bp_code) {
                            if (confirm('Are you sure you want to delete this business partner?')) {
                                $.ajax({
                                    url: '{{ url('business_partners') }}/' + bp_code,
                                    type: 'DELETE',
                                    data: {
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(response) {
                                        // Debug response
                                        console.log(response);
                                        if (response.success) {
                                            // Reload the table after successful deletion
                                            $('#business_partners').DataTable().ajax.reload();
                                            alert('Business Partner deleted successfully!');
                                        } else {
                                            alert('Error: Business Partner not found.');
                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        console.log('Error:', error);
                                        alert('There was an error while deleting the business partner.');
                                    }
                                });
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>

    <!-- Styling for the table and buttons -->
    <style>
        /* General Styling */
        body,
        .text-gray-900,
        .dark\:text-gray-100,
        .text-gray-800,
        .dark\:text-gray-200 {
            color: black !important;
        }

        /* Table Styling */
        #bp-table {
            border-collapse: separate;
            width: 100%;
        }

        #bp-table th,
        #bp-table td {
            padding: 16px;
            border: 1px solid #e5e7eb;
            text-align: left;
        }

        #bp-table thead {
            background-color: #f3f4f6;
        }

        #bp-table tbody tr:hover {
            background-color: #f1f5f9;
        }

        #bp-table tbody tr:nth-child(even) {
            background-color: #f9fafb;
        }

        /* Button Styling */
        .btn-primary {
            background-color: #2563eb;
            color: white;
            border-radius: 12px;
            font-size: 16px;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #1e40af;
        }

        .btn-danger {
            background-color: #e11d48;
            color: white;
            border-radius: 12px;
            font-size: 14px;
            padding: 8px 16px;
            transition: background-color 0.3s;
        }

        .btn-danger:hover {
            background-color: #9b1c33;
        }

        .btn-warning {
            background-color: #f59e0b;
            color: white;
            border-radius: 12px;
            font-size: 14px;
            padding: 8px 16px;
            transition: background-color 0.3s;
        }

        .btn-warning:hover {
            background-color: #d97706;
        }

        /* Make the buttons more prominent */
        .btn {
            text-align: center;
        }

        /* Responsive Table */
        @media (max-width: 768px) {

            #bp-table th,
            #bp-table td {
                padding: 8px;
            }

            .btn {
                font-size: 12px;
                padding: 6px 12px;
            }
        }

        /* Section Padding */
        .p-6 {
            padding: 24px;
        }
    </style>
</x-app-layout>
