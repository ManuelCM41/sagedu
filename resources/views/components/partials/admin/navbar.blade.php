<flux:header sticky class="h-[4.5rem] !px-3.5 !z-0">

    <div class="flex items-center gap-3 transition-all">
        <x-button class="!rounded-full lg:!block !hidden !px-2.5" color="transparent"
            @click="sidebarExpanded = !sidebarExpanded">
            <i class="fa-solid fa-lg fa-fw" :class="sidebarExpanded ? 'fa-bars' : 'fa-bars-staggered'"></i>
        </x-button>

        <x-button class="!rounded-full lg:!hidden !block !px-2.5" color="transparent"
            x-on:click="$dispatch('flux-sidebar-toggle')" data-flux-sidebar-toggle>
            <i class="fa-solid fa-bars-staggered fa-lg fa-fw"></i>
        </x-button>
        <div class="w-[1px] bg-zinc-300/60 h-10"></div>
        <a href="{{ route('dashboard') }}" wire:navigate class="flex items-center shrink-0">
            <div class="flex items-center gap-2 text-white">
                <img class="w-12" src="{{ asset('/img/logo.png') }}" alt="" />
                <div>
                    <p class="text-xs italic">
                        BIenvenido al
                    </p>
                    <p class="text-xl italic font-bold">
                        <span class="text-sky-500">
                            <span class="text-yellow-400">SA</span>GEDU
                        </span>
                    </p>
                </div>
            </div>
        </a>

        @php
            $hour = date('H');
        @endphp


    </div>

    <flux:spacer />

    <div class="flex gap-2">
        <div class="flex items-center text-xs text-white ml-6">
            @if ($hour >= 0 && $hour < 12)
                <span>{{ __('Buenos días') }} 👋!</span>
            @elseif ($hour >= 12 && $hour < 18)
                <span>{{ __('Buenas tardes') }} 👋!</span>
            @else
                <span>{{ __('Buenas noches') }} 👋!</span>
            @endif
        </div>

        <flux:dropdown position="top" align="end">
            <flux:profile :initials="auth()->user()->initials()" :name="auth()->user()->name"
                icon-trailing="chevron-down" />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>
                        {{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        Cerrar sesión
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </div>
</flux:header>
