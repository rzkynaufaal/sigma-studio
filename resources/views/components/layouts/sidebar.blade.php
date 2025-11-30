{{-- resources/views/components/layouts/sidebar.blade.php --}}

<flux:sidebar 
    sticky 
    stashable 
    class="
        border-e border-zinc-800 
        bg-gradient-to-b from-[#0d0d0d] to-[#151515]
        text-zinc-300
        dark:bg-gradient-to-b dark:from-[#0d0d0d] dark:to-[#151515]
        dark:border-zinc-800
        shadow-xl
    "
>

    @php $role = auth()->user()->role; @endphp

    {{-- ============================================= --}}
    {{-- HEADER AREA - DITINGKATKAN DENGAN GRADIEN --}}
    {{-- ============================================= --}}
    <div class="px-6 pt-8 pb-6 border-b border-zinc-800/70 bg-gradient-to-r from-primary-900/10 to-transparent">
        <div class="flex items-center gap-3">
            {{-- Logo/Icon --}}
            <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-gradient-to-br from-primary-500 to-primary-700 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                </svg>
            </div>
            
            {{-- Judul --}}
            <div>
                <h2 class="text-lg font-bold tracking-tight text-primary-500">
                    SIGMA STUDIO
                </h2>
                {{-- <p class="text-xs text-zinc-500 mt-1">
                    {{ ucfirst($role) }} Panel
                </p> --}}
            </div>
        </div>
    </div>

    {{-- ====================== ADMIN ====================== --}}
    @if ($role === 'admin')
        <flux:navlist variant="outline" class="mt-6 px-4">

            <flux:navlist.group class="grid gap-2">
                {{-- Dashboard --}}
                <flux:navlist.item 
                    icon="home"
                    :href="route('admin.dashboard')" 
                    :current="request()->routeIs('admin.dashboard')"
                    class="sidebar-link"
                    wire:navigate
                >
                    <div class="flex flex-col">
                        <span>Dashboard</span>
                        <span class="text-xs text-zinc-500 font-normal mt-0.5">Ringkasan sistem</span>
                    </div>
                </flux:navlist.item>

                {{-- Kelola Layanan --}}
                <flux:navlist.item 
                    icon="scissors"
                    :href="route('admin.services.index')"
                    :current="request()->routeIs('admin.services.index')"
                    class="sidebar-link"
                    wire:navigate
                >
                    <div class="flex flex-col">
                        <span>Kelola Layanan</span>
                        <span class="text-xs text-zinc-500 font-normal mt-0.5">Atur layanan & harga</span>
                    </div>
                </flux:navlist.item>

                {{-- Semua Reservasi --}}
                <flux:navlist.item 
                    icon="calendar-days"
                    :href="route('admin.bookings.index')"
                    :current="request()->routeIs('admin.bookings.index')"
                    class="sidebar-link"
                    wire:navigate
                >
                    <div class="flex flex-col">
                        <span>Semua Reservasi</span>
                        <span class="text-xs text-zinc-500 font-normal mt-0.5">Kelola semua booking</span>
                    </div>
                </flux:navlist.item>

                {{-- Laporan --}}
                <flux:navlist.item 
                    icon="book-open-text" 
                    :href="route('admin.reports')"
                   
                    class="sidebar-link" 
                    wire:navigate
                >
                    <div class="flex flex-col">
                        <span>Laporan</span>
                        <span class="text-xs text-zinc-500 font-normal mt-0.5">Analisis & statistik</span>
                    </div>
                </flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>
    @endif

    {{-- ====================== STAFF ====================== --}}
    @if ($role === 'staff')
        <flux:navlist variant="outline" class="mt-6 px-4">

            <flux:navlist.group 
                heading="Menu Staff" 
                class="grid gap-2"
            >
                <flux:navlist.item 
                    icon="home"
                    :href="route('staff.dashboard')" 
                    :current="request()->routeIs('staff.dashboard')"
                    class="sidebar-link"
                    wire:navigate
                >
                    <div class="flex flex-col">
                        <span>Dashboard</span>
                        <span class="text-xs text-zinc-500 font-normal mt-0.5">Ringkasan harian</span>
                    </div>
                </flux:navlist.item>

                <flux:navlist.item 
                    icon="calendar-days"
                    :href="route('staff.bookings.today')"  
                    :current="request()->routeIs('staff.bookings.today')"
                    class="sidebar-link"
                    wire:navigate
                >
                    <div class="flex flex-col">
                        <span>Reservasi Hari Ini</span>
                        <span class="text-xs text-zinc-500 font-normal mt-0.5">Booking hari ini</span>
                    </div>
                </flux:navlist.item>

                <flux:navlist.item 
                    icon="clock"
                    :href="route('staff.schedule')" 
                    :current="request()->routeIs('staff.schedule')"
                    class="sidebar-link"
                    wire:navigate
                >
                    <div class="flex flex-col">
                        <span>Jadwal Saya</span>
                        <span class="text-xs text-zinc-500 font-normal mt-0.5">Jadwal pribadi</span>
                    </div>
                </flux:navlist.item>

                <flux:navlist.item 
                    icon="star"
                    :href="route('staff.reviews')"
                    :current="request()->routeIs('staff.reviews')"
                    class="sidebar-link"
                >
                    <div class="flex flex-col">
                        <span>Review Reservasi</span>
                        <span class="text-xs text-zinc-500 font-normal mt-0.5">Ulasan pelanggan</span>
                    </div>
                </flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>
    @endif

    {{-- ====================== CUSTOMER ====================== --}}
    @if ($role === 'customer')
        <flux:navlist variant="outline" class="mt-6 px-4">

            <flux:navlist.group 
                heading="Menu Customer" 
                class="grid gap-2"
            >
                <flux:navlist.item 
                    icon="home"
                    :href="route('customer.dashboard')" 
                    :current="request()->routeIs('customer.dashboard')"
                    class="sidebar-link"
                    wire:navigate
                >
                    <div class="flex flex-col">
                        <span>Dashboard</span>
                        <span class="text-xs text-zinc-500 font-normal mt-0.5">Ringkasan akun</span>
                    </div>
                </flux:navlist.item>

                <flux:navlist.item 
                    icon="scissors"
                    :href="route('customer.services.index')"
                    :current="request()->routeIs('customer.services.index')"
                    class="sidebar-link"
                    wire:navigate
                >
                    <div class="flex flex-col">
                        <span>Katalog Layanan</span>
                        <span class="text-xs text-zinc-500 font-normal mt-0.5">Jelajahi layanan</span>
                    </div>
                </flux:navlist.item>

                <flux:navlist.item 
                    icon="calendar-days"
                    :href="route('customer.book')"
                    :current="request()->routeIs('customer.book')"
                    class="sidebar-link"
                    wire:navigate
                >
                    <div class="flex flex-col">
                        <span>Buat Reservasi</span>
                        <span class="text-xs text-zinc-500 font-normal mt-0.5">Booking baru</span>
                    </div>
                </flux:navlist.item>

                <flux:navlist.item 
                    icon="book-open"
                    :href="route('customer.bookings.history')"
                    :current="request()->routeIs('customer.bookings.history')"
                    class="sidebar-link"
                    wire:navigate
                >
                    <div class="flex flex-col">
                        <span>Riwayat Reservasi</span>
                        <span class="text-xs text-zinc-500 font-normal mt-0.5">Histori booking</span>
                    </div>
                </flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>
    @endif

    {{-- FOOTER DENGAN USER INFO --}}
    {{-- <div class="mt-auto px-4 py-6 border-t border-zinc-800/70">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-full bg-gradient-to-br from-primary-600 to-primary-800 flex items-center justify-center text-white text-sm font-semibold shadow-md">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-zinc-200 truncate">{{ auth()->user()->name }}</p>
                <p class="text-xs text-zinc-500 truncate">{{ auth()->user()->email }}</p>
            </div>
        </div>
    </div> --}}
</flux:sidebar>

{{-- Extra Styling --}}
<style>
    .sidebar-link {
        @apply text-zinc-300 hover:text-primary-300 
               hover:bg-gradient-to-r hover:from-primary-900/20 hover:to-transparent
               rounded-xl transition-all duration-300 
               border border-transparent hover:border-primary-500/30
               px-4 py-3 my-1
               shadow-sm hover:shadow-md;
    }

    .flux-navlist-item[data-current="true"] {
        @apply bg-gradient-to-r from-primary-900/30 to-primary-800/10 
               text-primary-300 border border-primary-500/40
               shadow-md;
    }

    .flux-navlist-group-heading {
        @apply text-xs uppercase tracking-wider font-semibold text-zinc-500 
               mb-3 mt-6 px-2;
    }

    /* Animasi halus untuk hover */
    .sidebar-link:hover {
        transform: translateX(4px);
    }
</style>