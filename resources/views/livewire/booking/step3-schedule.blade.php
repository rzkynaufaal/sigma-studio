<div class="space-y-6">

    <h1 class="text-2xl font-bold text-zinc-100">Pilih Tanggal & Jam</h1>

    <h2 class="text-zinc-300 font-semibold">Pilih Tanggal</h2>

    <div class="flex gap-3 overflow-x-auto pb-3">

        @foreach($dates as $date)
        <div>
            <button
                wire:click="selectDate('{{ $date }}')"
                class="px-4 py-2 rounded-lg 
                    {{ $selectedDate === $date ? 'bg-primary-600 text-white' : 'bg-zinc-700 text-zinc-300' }}">
                {{ \Carbon\Carbon::parse($date)->isoFormat('D MMM') }}
            </button>
        </div>
        @endforeach

    </div>


    @if($selectedDate)

        <h2 class="text-zinc-300 font-semibold mt-6">Pilih Jam</h2>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 mt-3">

            @foreach($availableTimes as $time)
            <button
                wire:click="selectTime('{{ $time }}')"
                class="px-4 py-2 rounded-lg bg-primary-600 text-white text-center">
                {{ $time }}
            </button>
            @endforeach

        </div>

    @endif

</div>
