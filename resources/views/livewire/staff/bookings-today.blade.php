<div class="space-y-8">

    <h1 class="text-3xl font-bold text-white">Daftar Reservasi</h1>
    <p class="text-zinc-400">Daftar Reservasi yang dijadwalkan hari ini.</p>

    @forelse ($bookingsToday as $b)
        <div class="p-5 rounded-xl bg-zinc-900 border border-zinc-700 flex items-center justify-between">

            <div>
                <h2 class="text-lg font-semibold text-white">{{ $b->service->name }}</h2>

                <p class="text-zinc-400 text-sm">
                    Pelanggan: {{ $b->customer->user->name }}
                </p>

                <p class="text-zinc-400 text-sm">
                    Jam: {{ $b->booking_time }}
                </p>

                <p class="text-zinc-400 text-sm">
                    Status: {{ ucfirst($b->status) }}
                </p>
            </div>

            <a href="{{ route('staff.booking.process', $b->id) }}"
                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                Mulai
            </a>

        </div>
    @empty

        <p class="text-zinc-500">Tidak ada booking hari ini.</p>

    @endforelse

</div>
