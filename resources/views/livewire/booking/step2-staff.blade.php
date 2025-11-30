<div class="space-y-6">

    <h1 class="text-2xl font-bold text-zinc-100">Pilih Staff</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach($staff as $s)
        <div class="p-5 rounded-xl bg-zinc-800 border border-zinc-700 shadow">

            <h2 class="text-lg font-semibold text-zinc-100">{{ $s->name }}</h2>
            <p class="text-zinc-400 text-sm mt-1">Barber Profesional</p>

            <div class="mt-4">
                <flux:button variant="primary" class="w-full"
                    wire:click="selectStaff({{ $s->id }})">
                    Pilih Staff
                </flux:button>
            </div>

        </div>
        @endforeach

    </div>

</div>
