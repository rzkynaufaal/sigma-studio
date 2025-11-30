{{-- resources/views/livewire/admin/bookings/index.blade.php --}}
<div 
    class="space-y-6" 
    x-data="{ openDrawer: false }"
    x-on:review-loaded.window="openDrawer = true"
>

    {{-- ================= TITLE ================= --}}
    <h1 class="text-2xl font-bold text-zinc-100">Semua Booking</h1>

    {{-- ================= FILTER ================= --}}
    <div class="flex items-center gap-4">
        <flux:input 
            wire:model.debounce.300ms="search"
            placeholder="Cari customer..."
            class="w-60"
        />

        <flux:select wire:model="status" class="w-40">
            <option value="">Semua Status</option>
            <option value="pending">Pending</option>
            <option value="confirmed">Confirmed</option>
            <option value="completed">Completed</option>
            <option value="canceled">Canceled</option>
        </flux:select>
    </div>

    {{-- ================= TABEL ================= --}}
    <div class="rounded-xl overflow-hidden border border-zinc-700 bg-zinc-800">

        <table class="w-full text-sm text-zinc-300">
            <thead class="bg-zinc-900 text-zinc-400">
                <tr>
                    <th class="p-3">Customer</th>
                    <th class="p-3">Layanan</th>
                    <th class="p-3">Staff</th>
                    <th class="p-3">Tanggal</th>
                    <th class="p-3">Jam</th>
                    <th class="p-3">Harga</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Review</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($bookings as $b)
                    <tr class="border-t border-zinc-700">

                        <td class="p-3">{{ $b->customer->user->name }}</td>
                        <td class="p-3">{{ $b->service->name }}</td>
                        <td class="p-3">{{ $b->staff->user->name ?? '-' }}</td>
                        <td class="p-3">{{ $b->booking_date }}</td>
                        <td class="p-3">{{ $b->booking_time }}</td>
                        <td class="p-3">Rp {{ number_format($b->price) }}</td>

                        <td class="p-3">
                            @php
                                $colors = [
                                    'pending' => 'bg-yellow-500',
                                    'confirmed' => 'bg-blue-500',
                                    'completed' => 'bg-green-600',
                                    'canceled' => 'bg-red-600',
                                ];
                            @endphp
                            <span class="px-2 py-1 rounded text-xs text-white {{ $colors[$b->status] }}">
                                {{ ucfirst($b->status) }}
                            </span>
                        </td>

                        <td class="p-3">
                            @if ($b->rating)
                                <button 
                                    wire:click="showReview({{ $b->id }})"
                                    class="px-3 py-1 bg-primary-600 text-white rounded text-xs hover:bg-primary-700"
                                >
                                    ⭐ {{ number_format($b->rating,1) }}
                                </button>
                            @else
                                <span class="text-zinc-500 text-xs">Belum ada review</span>
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    {{-- PAGINATION --}}
    <div>
        {{ $bookings->links() }}
    </div>


    {{-- ================= DRAWER ================= --}}
    <div 
        x-show="openDrawer"
        x-cloak
        class="fixed inset-0 z-40 bg-black/50 backdrop-blur-sm flex justify-end"
    >
        <div 
            class="w-full max-w-md bg-[#111] border-l border-zinc-800 p-6 h-full overflow-y-auto"
            x-transition
        >
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-white">Detail Review</h2>
                <button @click="openDrawer = false" class="text-zinc-400 hover:text-white">✕</button>
            </div>

            {{-- === KONTEN REVIEW === --}}
            @if ($selectedReview)
                <div class="space-y-5">

                    <div>
                        <p class="text-xs text-zinc-500">Layanan</p>
                        <p class="text-primary-300 text-lg font-semibold">
                            {{ $selectedReview->service->name }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-zinc-500">Customer</p>
                        <p class="text-zinc-300">
                            {{ $selectedReview->customer->user->name }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-zinc-500">Staff</p>
                        <p class="text-zinc-300">
                            {{ $selectedReview->staff->user->name ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-zinc-500">Rating</p>
                        <p class="text-yellow-400 text-2xl">
                            ⭐ {{ number_format($selectedReview->rating, 1) }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-zinc-500">Review</p>
                        <p class="text-zinc-300 italic">
                            "{{ $selectedReview->review }}"
                        </p>
                    </div>

                    <div class="text-xs text-zinc-500">
                        Diberikan pada {{ $selectedReview->updated_at->format('d M Y H:i') }}
                    </div>

                </div>
            @else
                <p class="text-zinc-500 text-sm">Memuat detail review...</p>
            @endif

        </div>
    </div>

</div>
