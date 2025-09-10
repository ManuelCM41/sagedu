@props([
    'active' => false,
    'icon' => null,
    'message' => null,
    'hasSubmenu' => false,
])

@php
    $classes = $active ? '!text-blue-900 font-bold' : 'hover:text-gray-200 group';
    $classIcon = $icon ?: 'fa-solid fa-question';
@endphp

<a {{ $attributes->merge(['class' => 'block text-gray-400 truncate transition hover:cursor-pointer ' . $classes]) }}
    @if (!$hasSubmenu) wire:navigate @endif>
    <div class="flex items-center justify-between">
        <!-- Icono + Texto -->
        <div class="flex items-center truncate" :class="sidebarExpanded ? 'lg:mx-auto' : 'lg:mx-0'">
            <span class="{{ $active ? 'text-blue-900' : '' }} duration-200">
                <i class="{{ $classIcon }} fa-fw"></i>
            </span>

            <span class="text-xs ml-2 2xl:opacity-100 duration-200 truncate {{ $active ? 'font-medium' : '' }}"
                :class="sidebarExpanded ? 'lg:hidden' : 'lg:block'">
                {{ $slot }}
            </span>
        </div>

        <!-- Chevron si es menú con submenú -->
        @if ($hasSubmenu)
            <div class="flex shrink-0 ml-2 2xl:opacity-100 duration-200"
                :class="sidebarExpanded ? 'lg:hidden' : 'lg:flex'">
                <span class="ml-1 text-gray-500" :class="open ? 'rotate-180' : 'rotate-0'">
                    <i class="fa-solid fa-chevron-down fa-xs"></i>
                </span>
            </div>
        @endif

        <!-- Badge opcional -->
        @if ($message)
            <div class="flex flex-shrink-0 ml-2" :class="sidebarExpanded ? 'lg:hidden' : 'lg:flex'">
                <span
                    class="inline-flex items-center justify-center h-5 text-xs font-medium text-white bg-red-600 px-2 rounded">
                    {{ $message }}
                </span>
            </div>
        @endif
    </div>
</a>
