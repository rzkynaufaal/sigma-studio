<div 
    x-data="typingEffect()" 
    x-init="start()"
    class="space-y-10 animate-fadeIn"
>

    {{-- ===== TITLE ===== --}}
    <div 
    x-data="typingEffect()" 
    x-init="start('Selamat datang kembali, {{ auth()->user()->name }}!')"
    class="space-y-10 animate-fadeIn"
    >



        <p class="text-zinc-400 mt-1 h-[25px]">
    <span x-text="displayText"></span><span class="animate-pulse">|</span>
</p>

    </div>


    {{-- ===== STAT CARDS ===== --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div class="dashboard-card">
            <span class="text-zinc-400 text-sm">Total Booking</span>
            <div class="text-3xl font-bold text-white mt-1">{{ $totalBookings }}</div>
        </div>

        <div class="dashboard-card">
            <span class="text-zinc-400 text-sm">Booking Aktif</span>
            <div class="text-3xl font-bold text-white mt-1">{{ $activeBookings }}</div>
        </div>

        <div class="dashboard-card">
            <span class="text-zinc-400 text-sm">Selesai</span>
            <div class="text-3xl font-bold text-white mt-1">{{ $completedBookings }}</div>
        </div>
    </div>


    {{-- ===== BOOKING MENDATANG ===== --}}
    <div class="section-card">
        <h2 class="section-title">Booking Mendatang</h2>

        @forelse ($upcoming as $b)
            <div class="item-card group">
                <div>
                    <strong class="text-white">{{ $b->service->name }}</strong>
                    <div class="text-zinc-400 text-sm">
                        {{ \Carbon\Carbon::parse($b->booking_date)->isoFormat('D MMM YYYY') }} • {{ $b->booking_time }}
                    </div>
                    <div class="text-zinc-500 text-sm capitalize">
                        Status: {{ $b->status }}
                    </div>
                </div>

                <button class="btn-primary opacity-0 group-hover:opacity-100 transition-all duration-300">
                    Lihat
                </button>
            </div>
        @empty
            <p class="text-zinc-500">Tidak ada booking mendatang.</p>
        @endforelse
    </div>


    {{-- ===== RIWAYAT ===== --}}
    <div class="section-card">
        <h2 class="section-title">Riwayat Terbaru</h2>

        @forelse ($recent as $b)
            <div class="item-card">
                <div class="text-white font-medium">{{ $b->service->name }}</div>

                <div class="text-zinc-400 text-sm">
                    {{ \Carbon\Carbon::parse($b->booking_date)->isoFormat('D MMM YYYY') }} • {{ $b->booking_time }}
                </div>
            </div>
        @empty
            <p class="text-zinc-500">Belum ada riwayat booking.</p>
        @endforelse
    </div>


    {{-- ===== PUSH SCRIPT ===== --}}
    @push('scripts')
        <script>
            function typingEffect() {
                return {
                    fullText: @json("Selamat datang kembali, " . auth()->user()->name . "!"),
                    displayText: "",
                    index: 0,

                    start() {
                        const interval = setInterval(() => {
                            this.displayText = this.fullText.substring(0, this.index++);
                            if (this.index > this.fullText.length) clearInterval(interval);
                        }, 60);
                    }
                }
            }
        </script>
    @endpush

</div>   {{-- <=== SATU ROOT ELEMENT --}}
