<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#0d0d0d] text-zinc-100 antialiased">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        @include('components.layouts.sidebar')

        {{-- Main Content --}}
        <div class="flex flex-col flex-1 bg-[#0d0d0d]">

            {{-- Header --}}
            @includeIf('components.layouts.' . auth()->user()->role . '-header')

            {{-- Page Slot --}}
            <main class="p-6">
                {{ $slot }}
            </main>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @livewireScripts
    @fluxScripts

    
    @stack('scripts')

</body>
</html>
