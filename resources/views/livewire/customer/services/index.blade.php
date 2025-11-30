<div class="space-y-6">

    {{-- Heading --}}
    <div>
        <h1 class="text-3xl font-bold text-zinc-100">Layanan Barbershop</h1>
        <p class="text-zinc-400 text-sm mt-1">
            Pilih layanan terbaik dari Sigma Studio 💈 untuk pengalaman grooming terbaik.
        </p>
    </div>


    {{-- GRID OF SERVICES --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach ($services as $service)

            <div class="group rounded-xl border border-zinc-700 bg-zinc-800 p-5 shadow transition hover:border-primary-500 hover:shadow-primary-500/10">

                {{-- NAMA LAYANAN --}}
                <h2 class="text-xl font-semibold text-zinc-100 group-hover:text-primary-400 transition">
                    {{ $service->name }}
                </h2>

                {{-- DESKRIPSI --}}
                <p class="text-zinc-400 text-sm mt-2 line-clamp-2">
                    {{ $service->description }}
                </p>

                {{-- DURASI --}}
                <div class="mt-4 flex items-center gap-2 text-zinc-300 text-sm">
                    <flux:icon name="clock" class="w-4 h-4 text-primary-400" />
                    Durasi: {{ $service->duration }} menit
                </div>

                {{-- HARGA --}}
                <div class="mt-2 flex items-center gap-2 text-zinc-300 text-sm">
                    <flux:icon name="wallet" class="w-4 h-4 text-primary-400" />
                    Harga:
                    <span class="font-semibold text-primary-400">
                        Rp {{ number_format($service->price, 0, ',', '.') }}
                    </span>
                </div>

                {{-- CTA BUTTON --}}
                <div class="mt-6">
                <flux:button 
                variant="primary" 
                class="w-full"
                href="{{ route('customer.book') }}"
                wire:navigate>
                Booking Sekarang
                </flux:button>

                </div>

            </div>

        @endforeach

        @if ($services->isEmpty())
            <div class="col-span-full text-center text-zinc-400 py-10">
                Belum ada layanan tersedia untuk saat ini.
            </div>
        @endif

    </div>

</div>
