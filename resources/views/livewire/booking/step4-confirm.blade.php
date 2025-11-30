<div class="space-y-6">

    <h1 class="text-2xl font-bold text-zinc-100">Konfirmasi Booking</h1>

    <div class="rounded-xl bg-zinc-800 border border-zinc-700 p-6 space-y-3">

        <div class="text-zinc-300">
            <strong>Layanan:</strong> {{ $service->name }}
        </div>

        <div class="text-zinc-300">
            <strong>Staff:</strong> {{ $staff->name }}
        </div>

        <div class="text-zinc-300">
            <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($date)->isoFormat('D MMMM YYYY') }}
        </div>

        <div class="text-zinc-300">
            <strong>Jam:</strong> {{ $time }}
        </div>

        <div class="text-zinc-300">
            <strong>Harga:</strong> Rp {{ number_format($service->price) }}
        </div>

    </div>

    <flux:button variant="primary" class="w-full text-lg" wire:click="confirm">
        Konfirmasi Booking
    </flux:button>

</div>
