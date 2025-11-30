<div class="space-y-10 animate-fadeIn">

    <h1 class="text-3xl font-bold text-white">Laporan Bulanan</h1>
    <p class="text-zinc-400">Pantau pendapatan & aktivitas bulan tertentu</p>

    {{-- Filter --}}
    <div class="flex gap-4">

        {{-- Bulan --}}
        <div class="w-40">
            <flux:select wire:model="month">
                @foreach ($monthsList as $num => $label)
                    <option value="{{ $num }}">{{ $label }}</option>
                @endforeach
            </flux:select>
        </div>

        {{-- Tahun --}}
        <div class="w-40">
            <flux:select wire:model="year">
                @foreach ($yearsList as $y)
                    <option value="{{ $y }}">{{ $y }}</option>
                @endforeach
            </flux:select>
        </div>

    </div>


    {{-- CARD STATISTIK --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- Total Pendapatan --}}
        <div class="dashboard-card">
            <p class="text-zinc-400 text-sm mb-2">Total Pendapatan</p>
            <p class="text-3xl font-bold text-white">
                Rp {{ number_format($totalRevenue, 0, ',', '.') }}
            </p>
        </div>

        {{-- Total Booking Selesai --}}
        <div class="dashboard-card">
            <p class="text-zinc-400 text-sm mb-2">Booking Selesai</p>
            <p class="text-3xl font-bold text-white">
                {{ count($bookings) }}
            </p>
        </div>

        {{-- Bulan Aktif --}}
        <div class="dashboard-card">
            <p class="text-zinc-400 text-sm mb-2">Periode</p>
            <p class="text-xl font-semibold text-primary-300">
                {{ $monthsList[$month] }} {{ $year }}
            </p>
        </div>

    </div>


    {{-- Tabel Booking Selesai --}}
    <div class="section-card">
        <h2 class="section-title mb-4">Booking Selesai Bulan Ini</h2>

        <table class="w-full text-sm text-zinc-300">
            <thead class="text-zinc-400 bg-zinc-900">
                <tr>
                    <th class="p-3 text-left">Tanggal</th>
                    <th class="p-3 text-left">Customer</th>
                    <th class="p-3 text-left">Layanan</th>
                    <th class="p-3 text-left">Harga</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($bookings as $b)
                    <tr class="border-t border-zinc-800">
                        <td class="p-3">{{ $b->booking_date }}</td>
                        <td class="p-3">{{ $b->customer->user->name }}</td>
                        <td class="p-3">{{ $b->service->name }}</td>
                        <td class="p-3">Rp {{ number_format($b->price, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-5 text-center text-zinc-500">
                            Tidak ada booking selesai pada bulan ini.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    {{-- LAYANAN TERLARIS --}}
    <div class="section-card">
        <h2 class="section-title">Layanan Terlaris Bulan Ini</h2>

        <ul class="space-y-3">

            @forelse ($topServices as $serviceId => $jumlah)
                <li class="flex justify-between text-zinc-300">
                    <span>{{ \App\Models\Service::find($serviceId)->name }}</span>
                    <span class="font-semibold">{{ $jumlah }}x</span>
                </li>

            @empty
                <li class="text-zinc-500 text-sm">
                    Belum ada data layanan bulan ini.
                </li>
            @endforelse

        </ul>
    </div>

</div>
