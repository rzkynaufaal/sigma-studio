<div class="space-y-6">
    <h1 class="text-2xl font-bold text-white">Riwayat Booking</h1>

    {{-- FLASH MESSAGE --}}
    @if (session('success'))
        <div class="p-4 rounded-xl border border-emerald-500/40 bg-gradient-to-r from-emerald-500/10 to-emerald-600/5 backdrop-blur-sm">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-3 text-emerald-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="text-emerald-200 text-sm">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <div class="space-y-4">
        @forelse ($bookings as $booking)
            <div class="border border-zinc-800 rounded-xl bg-zinc-950/80 backdrop-blur-sm transition-all duration-300 hover:border-zinc-700 hover:shadow-lg hover:shadow-zinc-900/30 overflow-hidden">

                {{-- HEADER SECTION --}}
                <div class="p-6 pb-4">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">
                        {{-- SERVICE INFO --}}
                        <div class="flex-1">
                            <div class="flex items-start gap-3">
                                <div class="mt-1.5 w-2 h-2 rounded-full bg-zinc-600 flex-shrink-0"></div>
                                <div class="flex-1">
                                    <h2 class="text-lg font-semibold text-white leading-tight">
                                        {{ $booking->service->name }}
                                    </h2>
                                    <div class="mt-3 space-y-2">
                                        <div class="flex items-center text-sm text-zinc-400">
                                            <svg class="w-4 h-4 mr-2 text-zinc-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            {{ $booking->booking_date }} • {{ $booking->booking_time }}
                                        </div>
                                        <div class="flex items-center text-sm text-zinc-400">
                                            <svg class="w-4 h-4 mr-2 text-zinc-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                            Staff: {{ $booking->staff?->name ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- STATUS & PRICE --}}
                        <div class="flex sm:flex-col items-start sm:items-end gap-3">
                            @php
                                $color = match($booking->status) {
                                    'pending' => 'badge-status-pending',
                                    'confirmed' => 'badge-status-confirmed',
                                    'completed' => 'badge-status-completed',
                                    'cancelled' => 'badge-status-cancelled',
                                    default => 'badge-status-pending',
                                };
                            @endphp
                            
                            <span class="{{ $color }} px-3 py-1.5 rounded-full text-xs font-medium">
                                {{ ucfirst($booking->status) }}
                            </span>
                            
                            <div class="text-right">
                                <p class="text-xs text-zinc-500">Total</p>
                                <p class="text-lg font-semibold text-white">Rp {{ number_format($booking->price) }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- COMPLETED BOOKING CONTENT --}}
                @if($booking->status === 'completed')
                    <div class="border-t border-zinc-800/50">

                        {{-- QR & INVOICE SECTION --}}
                        <div class="p-6 pt-4">
                            <div class="flex flex-col lg:flex-row lg:items-start justify-between gap-6">
                                {{-- QR CODE --}}
                                <div class="flex flex-col items-center">
                                    <p class="text-xs text-zinc-500 mb-3 font-medium">KODE BOOKING</p>
                                    <div class="relative group">
                                        <div class="absolute inset-0 bg-gradient-to-r from-zinc-600/20 to-zinc-800/20 rounded-xl blur-sm group-hover:blur-md transition-all duration-300"></div>
                                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ urlencode($booking->code) }}"
                                             class="relative w-32 h-32 rounded-lg border border-zinc-700 group-hover:scale-105 transition-transform duration-300 z-10" />
                                    </div>
                                    <p class="mt-2 text-xs text-zinc-600 font-mono">{{ $booking->code }}</p>
                                    
                                    {{-- INVOICE BUTTON --}}
                                    <div class="mt-4">
                                        <a href="{{ route('customer.booking.invoice', $booking->id) }}" 
                                           class="inline-flex items-center px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/20">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                            Download Invoice
                                        </a>
                                    </div>
                                </div>

                                {{-- REVIEW SECTION --}}
                                <div class="flex-1 max-w-md">
                                    <div class="flex items-center justify-between mb-4">
                                        <p class="text-sm font-medium text-zinc-300">Ulasan Layanan</p>
                                        @if($booking->rating)
                                            <span class="text-xs text-emerald-500 bg-emerald-500/10 px-2 py-1 rounded-full">
                                                ✓ Sudah dinilai
                                            </span>
                                        @endif
                                    </div>

                                    {{-- EXISTING REVIEW --}}
                                    @if($booking->rating)
                                        <div class="p-4 rounded-xl bg-zinc-900/50 border border-zinc-800/50">
                                            <div class="flex items-center gap-3 mb-3">
                                                <div class="flex text-amber-400 text-lg">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        @if($i <= $booking->rating)
                                                            ★
                                                        @else
                                                            ☆
                                                        @endif
                                                    @endfor
                                                </div>
                                                <span class="text-amber-300 font-semibold">{{ $booking->rating }}.0</span>
                                            </div>
                                            @if($booking->review)
                                                <p class="text-sm text-zinc-300 leading-relaxed">"{{ $booking->review }}"</p>
                                            @endif
                                            <p class="mt-3 text-xs text-zinc-500">Terima kasih atas ulasan Anda! 🙌</p>
                                        </div>
                                    @else
                                        {{-- REVIEW PROMPT --}}
                                        <div class="text-center p-6 rounded-xl bg-gradient-to-br from-zinc-900/50 to-zinc-800/30 border border-zinc-800/50">
                                            <svg class="w-12 h-12 mx-auto text-zinc-600 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                            </svg>
                                            <p class="text-zinc-400 text-sm mb-4">Bagaimana pengalaman Anda dengan layanan ini?</p>
                                            <button
                                                wire:click="openReview({{ $booking->id }})"
                                                class="inline-flex items-center px-4 py-2.5 bg-zinc-800 hover:bg-zinc-700 text-white rounded-lg text-sm font-medium transition-all duration-300 hover:shadow-lg border border-zinc-700"
                                            >
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                                </svg>
                                                Beri Ulasan
                                            </button>
                                        </div>
                                    @endif

                                    {{-- EDIT REVIEW BUTTON --}}
                                    @if($booking->rating)
                                        <div class="mt-4">
                                            <button
                                                wire:click="openReview({{ $booking->id }})"
                                                class="w-full inline-flex items-center justify-center px-4 py-2 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 rounded-lg text-sm font-medium transition-all duration-300 border border-zinc-700 hover:border-zinc-600"
                                            >
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                                Edit Ulasan
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- REVIEW FORM --}}
                        @if($selectedId === $booking->id)
                            <div class="border-t border-zinc-800/50 bg-zinc-900/30">
                                <div class="p-6">
                                    <div class="max-w-2xl mx-auto">
                                        <div class="flex items-center justify-between mb-6">
                                            <h3 class="text-lg font-semibold text-white">
                                                {{ $booking->rating ? 'Edit Ulasan' : 'Beri Ulasan' }}
                                            </h3>
                                            <button wire:click="$set('selectedId', null)" class="text-zinc-500 hover:text-zinc-300 transition-colors">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                            </button>
                                        </div>

                                        {{-- STAR RATING --}}
                                        <div class="mb-6">
                                            <p class="text-sm text-zinc-400 mb-3 font-medium">Rating Layanan</p>
                                            <div class="flex gap-1">
                                                @for($i=1; $i<=5; $i++)
                                                    <button 
                                                        wire:click="$set('rating', {{ $i }})"
                                                        class="p-2 text-3xl transition-all duration-200 {{ $rating >= $i ? 'text-amber-400 scale-110' : 'text-zinc-600 hover:text-zinc-400' }}"
                                                    >
                                                        ★
                                                    </button>
                                                @endfor
                                            </div>
                                            <div class="flex justify-between text-xs text-zinc-500 mt-2 px-1">
                                                <span>Tidak Puas</span>
                                                <span>Sangat Puas</span>
                                            </div>
                                        </div>

                                        {{-- REVIEW TEXTAREA --}}
                                        <div class="mb-6">
                                            <label class="block text-sm text-zinc-400 mb-3 font-medium">
                                                Ulasan Anda (opsional)
                                            </label>
                                            <textarea 
                                                wire:model.defer="review"
                                                class="w-full rounded-xl bg-zinc-800 border border-zinc-700 p-4 text-sm text-white placeholder-zinc-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors resize-none"
                                                rows="4"
                                                placeholder="Ceritakan pengalaman Anda menggunakan layanan ini..."
                                            ></textarea>
                                            <p class="text-xs text-zinc-500 mt-2">Bagikan pengalaman Anda untuk membantu kami meningkatkan kualitas layanan.</p>
                                        </div>

                                        {{-- ACTION BUTTONS --}}
                                        <div class="flex justify-end gap-3">
                                            <button 
                                                wire:click="$set('selectedId', null)" 
                                                class="px-6 py-2.5 border border-zinc-700 text-zinc-300 rounded-lg text-sm font-medium hover:bg-zinc-800 transition-all duration-300"
                                            >
                                                Batal
                                            </button>
                                            <button 
                                                wire:click="saveReview" 
                                                class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/20 disabled:opacity-50 disabled:cursor-not-allowed"
                                                {{ $rating == 0 ? 'disabled' : '' }}
                                            >
                                                Simpan Ulasan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endif

            </div>
        @empty
            {{-- EMPTY STATE --}}
            <div class="text-center py-16 border-2 border-dashed border-zinc-800 rounded-xl bg-zinc-900/20">
                <svg class="w-16 h-16 mx-auto text-zinc-700 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                <h3 class="text-lg font-medium text-zinc-300 mb-2">Belum ada riwayat booking</h3>
                <p class="text-zinc-500 text-sm max-w-md mx-auto">Booking layanan Anda akan muncul di sini setelah Anda melakukan pemesanan.</p>
            </div>
        @endforelse
    </div>
</div>