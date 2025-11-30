{{-- NAVBAR KHUSUS ADMIN --}}
<flux:header 
    class="
        border-b border-zinc-800 
        bg-[#0d0d0d]/95 backdrop-blur-md
        text-zinc-200
    "
>

    {{-- Sidebar Toggle (Mobile) --}}
    <flux:sidebar.toggle class="lg:hidden text-zinc-300" icon="bars-2" inset="left" />

    {{-- Title --}}
    <div class="flex items-center gap-2 font-semibold text-lg text-primary-400">
        <flux:icon name="home" class="w-5 h-5 text-primary-400" />
        <span>Admin Sigma</span>
    </div>

    <flux:spacer />

    {{-- Right Menu --}}
    <div class="flex items-center gap-4">

        {{-- Notifications --}}
        <flux:button variant="ghost" class="relative text-zinc-300 hover:text-primary-300">
            <flux:icon name="bell" class="w-5 h-5" />
            <span class="absolute -top-1 -right-1 bg-red-600 rounded-full w-3 h-3"></span>
        </flux:button>

        {{-- Profile Dropdown --}}
        <flux:dropdown position="bottom" align="end">

            <flux:profile 
                :name="auth()->user()->name"
                :initials="auth()->user()->initials()"
                class="text-zinc-300"
                icon-trailing="chevron-down"
            />

            <flux:menu class="w-[220px] bg-[#111]/95 border border-zinc-800 backdrop-blur-lg">

                {{-- Profile Section --}}
                <div class="p-2 text-sm text-zinc-200">
                    <div class="flex items-center gap-2">

                        {{-- Avatar --}}
                        <span class="relative flex h-10 w-10 overflow-hidden rounded-lg">
                            <span class="flex h-full w-full items-center justify-center rounded-lg 
                                   bg-zinc-700 text-white">
                                {{ auth()->user()->initials() }}
                            </span>
                        </span>

                        {{-- Info --}}
                        <div class="grid flex-1 leading-tight">
                            <span class="truncate font-semibold text-primary-300">
                                {{ auth()->user()->name }}
                            </span>
                            <span class="truncate text-xs text-zinc-400">
                                {{ auth()->user()->email }}
                            </span>
                        </div>

                    </div>
                </div>

                <flux:menu.separator class="border-zinc-700" />

                {{-- Logout --}}
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item
                        as="button"
                        type="submit"
                        icon="arrow-right-start-on-rectangle"
                        class="w-full text-zinc-200 hover:text-primary-300 hover:bg-[#1a1a1a]"
                    >
                        Log Out
                    </flux:menu.item>
                </form>

            </flux:menu>
        </flux:dropdown>

    </div>

</flux:header>
