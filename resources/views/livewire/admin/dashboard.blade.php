<div class="space-y-10 animate-fadeIn">

    {{-- ===================== TITLE ===================== --}}
    <div>
        <h1 class="text-3xl font-bold text-white">Dashboard Admin</h1>
        <p class="text-zinc-400 mt-1">Ringkasan aktivitas sigma studio pekan ini</p>
    </div>

    {{-- ===================== STAT CARDS ===================== --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        {{-- Total Booking Pekan Ini --}}
        <div class="dashboard-card">
            <div class="flex items-center justify-between mb-3">
                <span class="text-zinc-400 text-sm">Total Booking Pekan Ini</span>
                <flux:icon name="calendar" class="w-5 h-5 text-primary-400" />
            </div>
            <div class="text-3xl font-bold text-white">
                {{ $weeklyBookings ?? 0 }}
            </div>
        </div>

        {{-- Pendapatan Pekan Ini --}}
        <div class="dashboard-card">
            <div class="flex items-center justify-between mb-3">
                <span class="text-zinc-400 text-sm">Pendapatan Pekan Ini</span>
                <flux:icon name="wallet" class="w-5 h-5 text-primary-400" />
            </div>
            <div class="text-3xl font-bold text-white">
                Rp {{ number_format($weeklyRevenue ?? 0, 0, ',', '.') }}
            </div>
        </div>

        {{-- Pending --}}
        <div class="dashboard-card">
            <div class="flex items-center justify-between mb-3">
                <span class="text-zinc-400 text-sm">Pending</span>
                <flux:icon name="clock" class="w-5 h-5 text-primary-400" />
            </div>
            <div class="text-3xl font-bold text-white">
                {{ $pendingBookings ?? 0 }}
            </div>
        </div>

        {{-- Total Pelanggan --}}
        <div class="dashboard-card">
            <div class="flex items-center justify-between mb-3">
                <span class="text-zinc-400 text-sm">Total Pelanggan</span>
                <flux:icon name="users" class="w-5 h-5 text-primary-400" />
            </div>
            <div class="text-3xl font-bold text-white">
                {{ $totalCustomers ?? 0 }}
            </div>
        </div>

    </div>


    {{-- ===================== GRAFIK BOOKING PEKANAN ===================== --}}
    <div class="section-card">
        <h2 class="section-title mb-4">Grafik Booking Pekanan</h2>

        {{-- wrapper tinggi fix biar grafik rapi --}}
        <div class="w-full" style="height: 300px;">
            <canvas id="bookingChart"></canvas>
        </div>
    </div>

    @script
    <script>
        (function () {
            function renderAdminChart() {
                const canvas = document.getElementById('bookingChart');
                if (!canvas) return;

                // pastikan Chart.js sudah ada
                if (typeof Chart === 'undefined') {
                    console.warn('Chart.js belum siap');
                    return;
                }

                // hancurkan chart lama kalau ada
                if (window.bookingChartInstance) {
                    window.bookingChartInstance.destroy();
                }

                const ctx = canvas.getContext('2d');

                window.bookingChartInstance = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: @json($labels),
                        datasets: [{
                            label: 'Jumlah Booking',
                            data: @json($data),
                            tension: 0.35,
                            borderWidth: 3,
                            borderColor: '#d9c699',
                            backgroundColor: 'rgba(217,198,153,0.15)',
                            fill: true,
                            pointRadius: 4,
                            pointBackgroundColor: '#d9c699',
                            pointBorderColor: '#ffffff'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false, // pakai tinggi 300px dari wrapper
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    color: '#bbbbbb',
                                    precision: 0,     // tanpa decimal
                                    stepSize: 1       // loncat per 1
                                },
                                grid: {
                                    color: 'rgba(255,255,255,0.08)'
                                }
                            },
                            x: {
                                ticks: {
                                    color: '#bbbbbb'
                                },
                                grid: {
                                    display: false
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                labels: {
                                    color: '#cccccc'
                                }
                            }
                        }
                    }
                });
            }

            // 🔥 panggil langsung di initial load
            renderAdminChart();

            // 🔁 render ulang kalau SPA navigate
            document.addEventListener('livewire:navigated', renderAdminChart);
            document.addEventListener('flux:navigated', renderAdminChart);
        })();
    </script>
    @endscript



    {{-- ===================== TOP SERVICES / STAFF / RECENT ===================== --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Top Layanan --}}
        <div class="section-card">
            <h2 class="section-title">Top Layanan Terlaris</h2>
            <ul class="space-y-3">
                @forelse ($topServices ?? [] as $service)
                    <li class="flex justify-between text-zinc-300">
                        <span>{{ $service->name }}</span>
                        <span class="font-semibold">{{ $service->total }}</span>
                    </li>
                @empty
                    <li class="text-zinc-500 text-sm">Belum ada data layanan.</li>
                @endforelse
            </ul>
        </div>

        {{-- Jadwal Staff --}}
        <div class="section-card">
            <h2 class="section-title">Jadwal Staff Hari Ini</h2>
            <ul class="space-y-3">
                @forelse ($todayStaff ?? [] as $staff)
                    <li class="flex justify-between text-zinc-300">
                        <span>{{ $staff->name }}</span>
                        <span class="font-semibold">{{ $staff->shift }}</span>
                    </li>
                @empty
                    <li class="text-zinc-500 text-sm">Tidak ada jadwal hari ini.</li>
                @endforelse
            </ul>
        </div>

        {{-- Booking Terbaru --}}
        <div class="section-card">
            <h2 class="section-title">Booking Terbaru</h2>
            <ul class="space-y-3">
                @forelse ($recentBookings ?? [] as $booking)
                    <li class="flex justify-between text-zinc-300 text-sm">
                        <span>{{ $booking->customer->name }}</span>
                        <span class="font-semibold">{{ $booking->service->name }}</span>
                    </li>
                @empty
                    <li class="text-zinc-500 text-sm">Belum ada booking.</li>
                @endforelse
            </ul>
        </div>

    </div>

</div>
