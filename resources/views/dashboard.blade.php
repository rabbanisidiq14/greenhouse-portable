<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/4 bg-gray-900 dark:bg-gray-700 min-h-screen p-6">
            <nav class="space-y-2">
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-white rounded hover:bg-gray-800">Dashboard</a>
                <a href="{{ route('manual-control') }}" class="block px-4 py-2 text-white rounded hover:bg-gray-800">Manual Control</a>
                <a href="{{ route('control-parameters') }}" class="block px-4 py-2 text-white rounded hover:bg-gray-800">Automatic Control</a>
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-white rounded hover:bg-gray-800">Profile</a>
                <a href="{{ route('clients') }}" class="block px-4 py-2 text-white rounded hover:bg-gray-800">Clients</a>
                <a href="{{ route('topics') }}" class="block px-4 py-2 text-white rounded hover:bg-gray-800">Topics</a>
            </nav>
        </div>
        
        <!-- Main Content -->
        <div class="w-3/4 p-6">
            <div id="charts-container">
                @for ($i = 1; $i <= 9; $i++)
                    <canvas id="sensorChart{{ $i }}" width="400" height="200"></canvas>
                @endfor
            </div>
        </div>
    </div>
</x-app-layout>
<!-- JavaScript for rendering charts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const updateInterval = 5000; // 5 seconds

        function fetchDataAndUpdateCharts() {
            fetch('/api/sensor-data')
                .then(response => response.json())
                .then(data => {
                    // Group data by topic_id
                    const groupedData = data.reduce((acc, item) => {
                        if (!acc[item.topic_id]) {
                            acc[item.topic_id] = {
                                topic_name: '',
                                data: []
                            };
                        }
                        acc[item.topic_id].data.push({
                            x: new Date(item.timestamp),
                            y: item.sensor_value
                        });

                        // Store the topic_name for labeling purposes
                        acc[item.topic_id].topic_name = item.topic_name || `Sensor ${item.topic_id}`;
                        return acc;
                    }, {});

                    // Update charts
                    Object.keys(groupedData).forEach((topicId, index) => {
                        const chartData = groupedData[topicId].data;
                        const topicName = groupedData[topicId].topic_name;

                        if (window['sensorChart' + (index + 1)]) {
                            // Update chart label with the topic name
                            window['sensorChart' + (index + 1)].data.datasets[0].label = topicName;
                            window['sensorChart' + (index + 1)].data.datasets[0].data = chartData;
                            window['sensorChart' + (index + 1)].update();
                        }
                    });
                });
        }

        function initializeCharts() {
            for (let i = 1; i <= 9; i++) {
                const ctx = document.getElementById('sensorChart' + i).getContext('2d');
                window['sensorChart' + i] = new Chart(ctx, {
                    type: 'line', // Change to line chart
                    data: {
                        datasets: [{
                            label: 'Sensor Data ' + i, // Placeholder, will be updated later
                            data: [], // Empty initially, will be populated later
                            backgroundColor: 'rgba(75, 192, 192, 0.6)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            fill: false,
                            tension: 0.1, // Smooth the lines
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'time',
                                time: {
                                    unit: 'minute'
                                },
                                title: {
                                    display: true,
                                    text: 'Timestamp',
                                    color: 'rgba(255,255,255, 0.8)'
                                },
                                ticks: {
                                    color: 'rgba(255,255,255, 0.8)'
                                }
                            },
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Sensor Value',
                                    color: 'rgba(255,255,255, 0.8)'
                                },
                                ticks: {
                                    color: 'rgba(255,255,255, 0.8)'
                                }
                            }
                        },
                        plugins: {
                            tooltip: {
                                titleColor: 'rgba(255, 255, 255, 1)',
                                bodyColor: 'rgba(255, 255, 255, 1)',
                                backgroundColor: 'rgba(0, 0, 0, 0.8)'
                            },
                            legend: {
                                labels: {
                                    color: 'rgba(255, 255, 255, 1)'
                                }
                            }
                        }
                    }
                });
            }
        }

        initializeCharts();
        fetchDataAndUpdateCharts(); // Initial load
        setInterval(fetchDataAndUpdateCharts, updateInterval); // Update every 5 seconds
    });
</script>