<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Informational Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg mb-6">
                <div class="p-8 text-black dark:text-gray-100">
                    <h1 class="text-3xl font-bold mb-4">Welcome to the Dashboard</h1>
                    <p class="text-lg">Here you can see the log data charts in a more compact and user-friendly view.</p>
                </div>
            </div>

            <!-- Three-Column Grid Layout for Charts -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Grafik Pertama -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg p-4">
                    <h1 class="text-xl font-semibold mb-4">Log Data Chart 1</h1>
                    <div class="relative h-60">
                        <canvas id="logsChart1"></canvas>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        var ctx1 = document.getElementById('logsChart1').getContext('2d');
                        var logsChart1 = new Chart(ctx1, {
                            type: 'bar',
                            data: {
                                labels: @json($logs1->pluck('date')),
                                datasets: [{
                                    label: 'Total Error Per-Tanggal',
                                    data: @json($logs1->pluck('total_logs')),
                                    borderColor: 'rgb(75, 192, 192)',
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderWidth: 2,
                                    fill: true,
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: { position: 'top' },
                                    tooltip: {
                                        callbacks: {
                                            label: function(tooltipItem) {
                                                return 'Logs: ' + tooltipItem.raw;
                                            }
                                        }
                                    }
                                },
                                scales: {
                                    x: { title: { display: true, text: 'Date' } },
                                    y: { title: { display: true, text: 'Number of Logs' } }
                                }
                            }
                        });
                    </script>
                </div>

                <!-- Grafik Kedua -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg p-4">
                    <h1 class="text-xl font-semibold mb-4">Log Data Chart 2</h1>
                    <div class="relative h-60">
                        <canvas id="logsChart2"></canvas>
                    </div>
                    <script>
                        var ctx2 = document.getElementById('logsChart2').getContext('2d');
                        var logsChart2 = new Chart(ctx2, {
                            type: 'bar',
                            data: {
                                labels: @json($logs2->pluck('bp_name')),
                                datasets: [{
                                    label: 'Total Error Per-BP',
                                    data: @json($logs2->pluck('total_logs')),
                                    borderColor: 'rgb(255, 99, 132)',
                                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                    borderWidth: 2,
                                    fill: true,
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: { position: 'top' },
                                    tooltip: {
                                        callbacks: {
                                            label: function(tooltipItem) {
                                                return 'Logs: ' + tooltipItem.raw;
                                            }
                                        }
                                    }
                                },
                                scales: {
                                    x: { title: { display: true, text: 'Business Partner' } },
                                    y: { title: { display: true, text: 'Number of Logs' } }
                                }
                            }
                        });
                    </script>
                </div>

                <!-- Grafik Ketiga -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg p-4">
                    <h1 class="text-xl font-semibold mb-4">Log Data Chart 3</h1>
                    <div class="relative h-60">
                        <canvas id="logsChart3"></canvas>
                    </div>
                    <script>
                        var ctx3 = document.getElementById('logsChart3').getContext('2d');
                        var logsChart3 = new Chart(ctx3, {
                            type: 'pie',
                            data: {
                                labels: @json($logs3->pluck('addon_name')),
                                datasets: [{
                                    label: 'Total Error Per-Addon',
                                    data: @json($logs3->pluck('total_logs')),
                                    borderColor: 'rgb(3, 252, 36)', // Border color for all segments
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.6)',  // Red
                                        'rgba(54, 162, 235, 0.6)',  // Blue
                                        'rgba(255, 206, 86, 0.6)',  // Yellow
                                        'rgba(75, 192, 192, 0.6)',  // Green
                                        'rgba(153, 102, 255, 0.6)', // Purple
                                        'rgba(255, 159, 64, 0.6)'   // Orange
                                    ], // Array of colors for each segment
                                    borderWidth: 2,
                                    fill: true,
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: { 
                                        position: 'top',
                                        labels: {
                                            font: {
                                                size: 14,
                                            }
                                        }
                                    },
                                    tooltip: {
                                        callbacks: {
                                            label: function(tooltipItem) {
                                                return 'Logs: ' + tooltipItem.raw;
                                            }
                                        }
                                    }
                                }
                            }
                        });
                    </script>
                </div>
                
            </div>
        </div>
    </div>

    <style>
        /* Mengubah warna teks di seluruh halaman menjadi hitam */
        body, .text-gray-900, .dark\:text-gray-100, .text-gray-800, .dark\:text-gray-200 {
            color: black !important;
        }
    </style>
</x-app-layout>
