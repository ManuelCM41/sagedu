@php
    $menuData = json_decode(file_get_contents(resource_path('/views/menuData.json')), true);
    $user = Auth::user();

    $userMenus = [];

    if ($user && $user->roles->isNotEmpty()) {
        $userPermissions = $user->roles
            ->flatMap(function ($role) {
                return $role->permissions->pluck('name');
            })
            ->unique()
            ->toArray();

        $userMenus = collect($menuData['menu'])
            ->filter(function ($menu) use ($userPermissions) {
                return isset($menu['permissions']) && !empty(array_intersect($menu['permissions'], $userPermissions));
            })
            ->map(function ($menu) use ($userPermissions) {
                if (isset($menu['submenu'])) {
                    $menu['submenu'] = array_filter($menu['submenu'], function ($submenu) use ($userPermissions) {
                        return isset($submenu['permissions']) &&
                            !empty(array_intersect($submenu['permissions'], $userPermissions));
                    });
                }
                return $menu;
            })
            ->toArray();
    }
@endphp

<flux:sidebar stashable class="bg-[#05134B] custom-scrollbar !transition-all !duration-500 relative pt-0 lg:z-0!" x-data
    x-bind:class="sidebarExpanded ? 'lg:!w-20 ' : 'lg:w-64'" x-cloak>

    <div class="absolute inset-0 z-10 flex items-end justify-center opacity-5">
        <img class="w-[22rem] h-[22rem] object-cover" src="/img/logo.png" alt="" />
    </div>

    <div class="relative h-full z-30 space-y-1">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        @foreach ($userMenus as $menu)
            @if (isset($menu['menuHeader']))
                @php
                    $showMenuHeader = count(array_intersect($menu['permissions'], $userPermissions)) > 0;
                @endphp
                @if ($showMenuHeader)
                    <div class="text-xs uppercase text-zinc-300 font-medium">
                        <div class="hidden text-center" :class="sidebarExpanded ? 'lg:block' : 'lg:hidden'">
                            •••
                        </div>
                        <div :class="sidebarExpanded ? 'lg:hidden' : 'lg:block'">
                            <li class="flex items-center py-2 text-xs uppercase text-zinc-300/60">
                                <span class="w-1/12 h-[1px] bg-zinc-300/60"></span>
                                <span class="flex-none text-xs mx-1 uppercase">
                                    {{ $menu['menuHeader'] }}
                                </span>
                                <span class="w-full h-[1px] bg-zinc-300/60"></span>
                            </li>
                        </div>
                    </div>
                @endif
            @else
                @php
                    $first_url = [];
                    $urls = [];

                    if (isset($menu['submenu'])) {
                        foreach ($menu['submenu'] as $segundoSubmenu) {
                            if (isset($segundoSubmenu['url'])) {
                                $first_url[] = $segundoSubmenu['url'];
                            }
                            if (isset($segundoSubmenu['submenu'])) {
                                foreach ($segundoSubmenu['submenu'] as $sub_submenu_item) {
                                    if (isset($sub_submenu_item['url'])) {
                                        $urls[] = $sub_submenu_item['url'];
                                    }
                                }
                            }
                        }
                    }

                    $isActive = false;

                    if (!empty($menu['url'] ?? null)) {
                        if (is_array($menu['url'])) {
                            $isActive = in_array(request()->route()->getName(), $menu['url']);
                        } else {
                            $isActive = request()->routeIs($menu['url']);
                        }
                    }
                @endphp

                <li class="px-2.5 py-2 rounded-lg last:mb-0 bg-gradient-to-l  @if ($isActive || in_array(request()->route()->getName(), $first_url) || in_array(request()->route()->getName(), $urls)) {{ '!from-gray-100/90 !to-white shadow ' }} @endif"
                    x-data="{ open: {{ $isActive || in_array(request()->route()->getName(), $first_url) || in_array(request()->route()->getName(), $urls) ? 'true' : 'false' }} }">
                    @if (isset($menu['submenu']))
                        <!-- Caso con submenú -->
                        <x-sidebar-item @click="open = ! open; sidebarExpanded = false" :active="$isActive ||
                            in_array(request()->route()->getName(), $first_url) ||
                            in_array(request()->route()->getName(), $urls)"
                            :icon="$menu['icon'] ?? ''" :hasSubmenu="true">
                            {{ $menu['name'] ?? 'Undefined' }}
                        </x-sidebar-item>
                    @else
                        <!-- Caso link normal -->
                        <x-sidebar-item
                            href="{{ isset($menu['url']) ? (is_array($menu['url']) ? route($menu['url'][0]) : route($menu['url'])) : 'javascript:void(0)' }}"
                            :active="$isActive" :icon="$menu['icon'] ?? ''">
                            {{ $menu['name'] ?? '' }}
                        </x-sidebar-item>
                    @endif

                    @isset($menu['submenu'])
                        @include('components.submenu', [
                            'menu' => $menu['submenu'],
                            'expanded' =>
                                $isActive ||
                                in_array(request()->route()->getName(), $first_url) ||
                                in_array(request()->route()->getName(), $urls)
                                    ? true
                                    : false,
                        ])
                    @endisset
                </li>
            @endif
        @endforeach
    </div>
</flux:sidebar>
