{{-- resources/views/livewire/staff/reviews.blade.php --}}
<div class="space-y-8">
    {{-- Header --}}
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-primary-300">
                Review Masuk
            </h1>
            <p class="text-zinc-500 text-sm mt-1">Review dari customer untuk layanan Anda</p>
        </div>
        
        @if(!$reviews->isEmpty())
        <div class="flex items-center gap-2 px-4 py-2 rounded-lg bg-zinc-900/50 border border-zinc-800">
            <svg class="w-4 h-4 text-zinc-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
            </svg>
            <span class="text-sm text-zinc-400">{{ $reviews->count() }} review</span>
        </div>
        @endif
    </div>

    {{-- Content --}}
    @if($reviews->isEmpty())
        {{-- Empty State --}}
        <div class="text-center py-16 border-2 border-dashed border-zinc-800 rounded-2xl bg-zinc-900/20">
            <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-zinc-900/50 flex items-center justify-center">
                <svg class="w-10 h-10 text-zinc-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
            </div>
            <h3 class="text-lg font-medium text-zinc-300 mb-2">Belum ada review</h3>
            <p class="text-zinc-500 text-sm max-w-sm mx-auto">
                Review dari pelanggan akan muncul di sini setelah mereka memberikan penilaian untuk layanan Anda.
            </p>
        </div>
    @else
        <div class="grid gap-6">
            @foreach($reviews as $r)
                <div class="group p-6 rounded-2xl bg-[#0d0d0d] border border-zinc-800 hover:border-zinc-700 transition-all duration-300 hover:shadow-2xl hover:shadow-zinc-900/20 backdrop-blur-sm">
                    
                    {{-- Header Section --}}
                    <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4 mb-4">
                        {{-- Service & Customer Info --}}
                        <div class="flex-1">
                            <div class="flex items-start gap-3">
                                <div class="mt-1 w-2 h-2 rounded-full bg-zinc-600 flex-shrink-0"></div>
                                <div>
                                    <h2 class="text-xl font-semibold text-white mb-2">
                                        {{ $r->service->name }}
                                    </h2>
                                    <div class="flex items-center text-sm text-zinc-400">
                                        <svg class="w-4 h-4 mr-2 text-zinc-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        Oleh: {{ $r->customer->user->name }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Rating Stars --}}
                        <div class="flex items-center gap-3 bg-zinc-900/50 px-4 py-2 rounded-xl border border-zinc-800">
                            <div class="flex items-center gap-1">
                                @for($i=1; $i<=5; $i++)
                                    <span class="text-lg {{ $i <= $r->rating ? 'text-amber-400' : 'text-zinc-600' }}">★</span>
                                @endfor
                            </div>
                            <span class="text-amber-300 font-semibold text-lg">{{ $r->rating }}.0</span>
                        </div>
                    </div>

                    {{-- Review Text --}}
                    @if($r->review)
                        <div class="mb-4">
                            <div class="relative">
                                <div class="absolute -left-3 top-0 text-4xl text-zinc-700 leading-4">"</div>
                                <p class="text-zinc-300 leading-relaxed pl-6 pr-4 text-lg">
                                    {{ $r->review }}
                                </p>
                                <div class="absolute -right-3 bottom-0 text-4xl text-zinc-700 leading-4">"</div>
                            </div>
                        </div>
                    @else
                        <div class="mb-4 p-4 rounded-xl bg-zinc-900/30 border border-zinc-800/50">
                            <p class="text-zinc-500 text-sm italic text-center">
                                Pelanggan tidak memberikan ulasan tertulis
                            </p>
                        </div>
                    @endif

                    {{-- Footer --}}
                    <div class="flex items-center justify-between pt-4 border-t border-zinc-800/50">
                        <div class="flex items-center text-sm text-zinc-500">
                            <svg class="w-4 h-4 mr-2 text-zinc-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Diberikan pada {{ $r->updated_at->format('d M Y') }} pukul {{ $r->updated_at->format('H:i') }}
                        </div>
                        
                        <div class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button class="p-2 text-zinc-500 hover:text-zinc-300 transition-colors rounded-lg hover:bg-zinc-800/50">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

        {{-- Pagination atau Load More --}}
        @if(method_exists($reviews, 'hasPages') && $reviews->hasPages())
            <div class="flex justify-center pt-6 border-t border-zinc-800/50">
                <div class="flex gap-2">
                    @if($reviews->onFirstPage())
                        <span class="px-4 py-2 rounded-lg bg-zinc-900/50 text-zinc-600 border border-zinc-800 text-sm">
                            ← Previous
                        </span>
                    @else
                        <a href="{{ $reviews->previousPageUrl() }}" class="px-4 py-2 rounded-lg bg-zinc-900 hover:bg-zinc-800 text-zinc-300 border border-zinc-700 text-sm transition-colors">
                            ← Previous
                        </a>
                    @endif

                    @if($reviews->hasMorePages())
                        <a href="{{ $reviews->nextPageUrl() }}" class="px-4 py-2 rounded-lg bg-zinc-900 hover:bg-zinc-800 text-zinc-300 border border-zinc-700 text-sm transition-colors">
                            Next →
                        </a>
                    @else
                        <span class="px-4 py-2 rounded-lg bg-zinc-900/50 text-zinc-600 border border-zinc-800 text-sm">
                            Next →
                        </span>
                    @endif
                </div>
            </div>
        @endif
    @endif

    {{-- CSS Styles --}}
    <style>
    .backdrop-blur-sm {
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }

    .hover\:shadow-2xl:hover {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    </style>
</div>