{{-- CHECKLIST --}}
<div class="p-5 rounded-xl bg-zinc-900 border border-zinc-700">
    <h2 class="text-xl font-semibold text-primary-400 mb-4">Checklist Servis</h2>

    @php
        $steps = [
            'Konsultasi model',
            'Cuci rambut',
            'Pemotongan rambut',
            'Finishing',
            'Pembersihan area'
        ];
    @endphp

    <div class="space-y-3">

        @foreach ($steps as $key => $step)
        <div 
            class="flex items-center justify-between p-3 rounded-lg border 
                   transition-all duration-300 cursor-pointer
                   @if($checklist[$key] ?? false)
                       bg-green-600/20 border-green-500 
                       shadow-[0_0_12px_rgba(34,197,94,0.4)]
                   @else
                       bg-zinc-800 border-zinc-600 hover:bg-zinc-700
                   @endif"
            wire:click="toggleChecklist({{ $key }})">

            <span class="text-white text-sm font-medium">
                {{ $step }}
            </span>

            <div class="relative w-6 h-6">

                @if($checklist[$key] ?? false)
                    {{-- ICON CHECK WITH ANIMATION --}}
                    <svg 
                        class="absolute inset-0 w-6 h-6 text-green-400 scale-100 opacity-100 transition-all duration-300"
                        fill="none" stroke="currentColor" stroke-width="3" 
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                              d="M5 13l4 4L19 7" />
                    </svg>
                @else
                    {{-- EMPTY CIRCLE --}}
                    <div
                        class="absolute inset-0 rounded-full border-2 border-zinc-500
                               scale-90 opacity-60 transition-all duration-300">
                    </div>
                @endif

            </div>

            

        </div>
        @endforeach

    </div>
        {{-- TOMBOL SELESAI --}}
    <div class="flex items-center justify-between pt-4">
        <p class="text-zinc-400 text-sm">
            Pastikan semua langkah sudah kamu selesaikan sebelum menekan tombol ini.
        </p>

       <button wire:click="finish"
    class="px-6 py-3 bg-green-600 hover:bg-green-700 
           text-white font-semibold rounded-lg
           shadow-lg shadow-green-500/30
           transition-all duration-200">
    Tandai Servis Selesai
</button>


    </div>

</div>
