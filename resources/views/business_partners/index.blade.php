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
                    {{-- {{ __("You're logged in!") }} --}}
                    <h1>Business Partners List</h1>
                    <a href="{{ route('business_partners.create') }}" class="btn btn-primary mb-3">Tambah Data Business Partners</a>

                    <table id="bp-table" class="display">
                        <thead>
                            <tr>
                                <th>BP Code</th>
                                <th>Business Partner Name</th>
                                <th>Address</th>
                                <th>Telegram Token</th>
                            </tr>
                        </thead>
                    </table>

                    <script>
                        $(document).ready(function () {
                            //alert("test");
                            $('#bp-table').DataTable({
                                processing: false,
                                serverSide: true,
                                ajax:
                                {
                                    url:'{{ route("business_partners.data") }}',
                                    type: 'GET',
                                    error: function(xhr, error, code) {
                                        console.log('Error:', error); // Untuk debugging
                                        $('#bp-table').html('<p class="text-center">Data tidak ditemukan atau terjadi kesalahan.</p>');
                                    }
                                },
                                columns: [
                                    { data: 'bp_code', name: 'bp_code' },
                                    { data: 'bp_name', name: 'bp_name' },
                                    { data: 'address', name: 'address' },
                                    { data: 'telegram_token', name: 'telegram_token' },
                                ]
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

