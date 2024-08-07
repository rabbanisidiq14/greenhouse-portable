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
                <a href="{{ route('automatic-control') }}" class="block px-4 py-2 text-white rounded hover:bg-gray-800">Automatic Control</a>
                <a href="{{ route('settings') }}" class="block px-4 py-2 text-white rounded hover:bg-gray-800">Settings</a>
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-white rounded hover:bg-gray-800">Profile</a>
                <a href="{{ route('clients') }}" class="block px-4 py-2 text-white rounded hover:bg-gray-800">Clients</a>
                <a href="{{ route('topics') }}" class="block px-4 py-2 text-white rounded hover:bg-gray-800">Topics</a>
            </nav>
        </div>
        
        <!-- Main Content -->
        <div class="w-3/4 p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Placeholder for 9 scatter charts -->
                @for ($i = 1; $i <= 9; $i++)
                    <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md">
                        <canvas id="chart{{ $i }}"></canvas>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Include Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- JavaScript for rendering charts -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const chartsData = [
        // Data for each of the 9 charts, replace with your own data
        @for ($i = 1; $i <= 9; $i++)
        {
            labels: ['Point 1', 'Point 2', 'Point 3'],
            datasets: [{
                label: 'Chart {{ $i }}',
                data: [
                    { x: 10, y: 20 },
                    { x: 15, y: 10 },
                    { x: 20, y: 30 }
                ],
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
            }]
        },
        @endfor
    ];

    chartsData.forEach((data, index) => {
        const ctx = document.getElementById('chart' + (index + 1)).getContext('2d');
        new Chart(ctx, {
            type: 'scatter',
            data: data,
            options: {
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            color: 'rgba(255,255,255, 0.8)' // Warna teks label sumbu X
                        },
                        title: {
                            color: 'rgba(255,255,255, 0.8)' // Warna teks judul sumbu X
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'rgba(255,255,255, 0.8)' // Warna teks label sumbu Y
                        },
                        title: {
                            color: 'rgba(255,255,255, 0.8)' // Warna teks judul sumbu Y
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        titleColor: 'rgba(255, 255, 255, 1)', // Warna teks judul tooltip
                        bodyColor: 'rgba(255, 255, 255, 1)', // Warna teks body tooltip
                        backgroundColor: 'rgba(0, 0, 0, 0.8)' // Warna latar belakang tooltip
                    },
                    legend: {
                        labels: {
                            color: 'rgba(255, 255, 255, 1)' // Warna teks label legenda
                        }
                    }
                }
            }
        });
    });
});
</script>
