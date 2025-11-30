<div class="space-y-10 animate-fadeIn">

    {{-- ===================== TITLE ===================== --}}
    <div>
        <h1 class="text-3xl font-bold text-white">Dashboard Staff</h1>
        <p class="text-zinc-400 mt-1">Ringkasan aktivitasmu hari ini.</p>
    </div>


    {{-- ===================== STAT CARDS ===================== --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        {{-- Booking Hari Ini --}}
        <div class="dashboard-card">
            <div class="flex items-center justify-between mb-3">
                <span class="text-zinc-400 text-sm">Booking Hari Ini</span>
                <flux:icon name="calendar" class="w-5 h-5 text-primary-400" />
            </div>
            <div class="text-3xl font-bold text-white">
                {{ $todayBookings }}
            </div>
        </div>

        {{-- Pending --}}
        <div class="dashboard-card">
            <div class="flex items-center justify-between mb-3">
                <span class="text-zinc-400 text-sm">Pending</span>
                <flux:icon name="clock" class="w-5 h-5 text-primary-400" />
            </div>
            <div class="text-3xl font-bold text-white">
                {{ $pendingBookings }}
            </div>
        </div>

        {{-- Completed --}}
        <div class="dashboard-card">
            <div class="flex items-center justify-between mb-3">
                <span class="text-zinc-400 text-sm">Selesai</span>
                <flux:icon name="check-circle" class="w-5 h-5 text-primary-400" />
            </div>
            <div class="text-3xl font-bold text-white">
                {{ $completedBookings }}
            </div>
        </div>

        {{-- Shift Hari Ini --}}
        <div class="dashboard-card">
            <div class="flex items-center justify-between mb-3">
                <span class="text-zinc-400 text-sm">Shift Hari Ini</span>
                <flux:icon name="clock" class="w-5 h-5 text-primary-400" />
            </div>
            <div class="text-xl font-bold text-white">
                {{ $todaySchedule }}
            </div>
        </div>

    </div>




    {{-- ===================== BOOKING HARI INI ===================== --}}
    <div class="section-card">
        <h2 class="section-title">Booking Hari Ini</h2>

        @forelse ($bookingsToday as $b)
            <div class="item-card mb-3">

                <div class="text-white">
                    <strong>{{ $b->customer->user->name }}</strong>
                    <div class="text-zinc-400 text-sm">{{ $b->service->name }}</div>
                    <div class="text-zinc-500 text-xs">Jam: {{ $b->booking_time }}</div>
                    <div class="text-zinc-500 text-xs">Status: {{ ucfirst($b->status) }}</div>
                </div>

                <div>
                    @if ($b->status === 'pending')
                        <a href="{{ route('staff.booking.process', $b->id) }}"
                           class="btn-primary">Mulai</a>

                    @elseif ($b->status === 'in_progress')
                        <a href="{{ route('staff.booking.process', $b->id) }}"
                           class="btn-primary">Lanjutkan</a>

                    @elseif ($b->status === 'completed')
                        <span class="px-4 py-2 rounded-lg bg-emerald-600 text-white">
                            Selesai
                        </span>
                    @endif
                </div>

            </div>
        @empty
            <p class="text-zinc-500">Tidak ada booking hari ini.</p>
        @endforelse
    </div>




    {{-- ===================== BOOKING MENDATANG ===================== --}}
    <div class="section-card">
        <h2 class="section-title">Booking Mendatang</h2>

        @forelse ($upcomingBookings as $b)
            <div class="item-card mb-3">
                <div class="text-white">
                    <strong>{{ $b->customer->user->name }}</strong>
                    <div class="text-zinc-400 text-sm">{{ $b->service->name }}</div>
                </div>

                <div class="text-primary-300 font-semibold">
                    {{ $b->booking_date }} — {{ $b->booking_time }}
                </div>
            </div>
        @empty
            <p class="text-zinc-500">Tidak ada booking mendatang.</p>
        @endforelse

    </div>

</div>
