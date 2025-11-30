<div class="space-y-8">

    <h1 class="text-2xl font-bold text-white">Jadwal Saya</h1>

    {{-- ================== RINGKASAN ================== --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

        <div class="p-4 rounded-xl bg-zinc-900 border border-zinc-800">
            <p class="text-xs text-zinc-500">Total Booking Hari Ini</p>
            <p class="text-3xl font-bold text-primary-300 mt-1">
                {{ $todayBookings->count() }}
            </p>
        </div>

        <div class="p-4 rounded-xl bg-zinc-900 border border-zinc-800">
            <p class="text-xs text-zinc-500">Tanggal</p>
            <p class="text-lg font-semibold text-zinc-300 mt-1">
                {{ now()->format('l, d M Y') }}
            </p>
        </div>

        <div class="p-4 rounded-xl bg-zinc-900 border border-zinc-800">
            <p class="text-xs text-zinc-500">Status</p>
            <p class="text-lg font-semibold text-green-400 mt-1">
                Aktif & Siap Melayani
            </p>
        </div>

    </div>


    {{-- ================== BOOKING HARI INI ================== --}}
    <div class="rounded-xl border border-zinc-800 bg-zinc-900">
        <div class="border-b border-zinc-800 p-4">
            <h2 class="text-lg font-semibold text-white">Booking Hari Ini</h2>
        </div>

        <table class="w-full text-sm text-zinc-300">
            <thead class="bg-zinc-800 text-zinc-400">
                <tr>
                    <th class="p-3 text-left">Jam</th>
                    <th class="p-3 text-left">Layanan</th>
                    <th class="p-3 text-left">Customer</th>
                    <th class="p-3 text-left">Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($todayBookings as $b)
                    <tr class="border-t border-zinc-800">
                        <td class="p-3">{{ $b->booking_time }}</td>
                        <td class="p-3">{{ $b->service->name }}</td>
                        <td class="p-3">{{ $b->customer->user->name }}</td>
                        <td class="p-3">
                            <span class="px-2 py-1 rounded text-xs 
                                @if($b->status=='pending') bg-yellow-600
                                @elseif($b->status=='confirmed') bg-blue-600
                                @elseif($b->status=='completed') bg-green-600
                                @else bg-red-600 
                                @endif
                            text-white">
                                {{ ucfirst($b->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center p-4 text-zinc-500">
                            Tidak ada booking hari ini.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    {{-- ================== KALENDER MINGGU INI ================== --}}
    <div class="rounded-xl border border-zinc-800 bg-zinc-900 p-4">
        <h2 class="text-lg font-semibold text-white mb-3"> Reservasi 7 Hari Ke Depan</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($calendar as $date => $items)
                <div class="p-4 rounded-xl bg-zinc-800 border border-zinc-700">
                    <p class="text-sm text-primary-300 font-semibold">
                        {{ \Carbon\Carbon::parse($date)->format('l, d M') }}
                    </p>

                    <ul class="mt-2 space-y-2">
                        @foreach($items as $item)
                            <li class="text-zinc-300 text-sm">
                                {{ $item['booking_time'] }} — {{ $item['service']['name'] }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach

            @if (count($calendar) === 0)
                <p class="text-zinc-500 text-sm">Tidak ada jadwal dalam 7 hari ke depan.</p>
            @endif
        </div>
    </div>

</div>
