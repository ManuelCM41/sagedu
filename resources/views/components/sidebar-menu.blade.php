@props(['active', 'icon'])

@php
    $classes = $active ? 'font-bold !text-black' : 'hover:text-gray-200 group';
    $classIcon = $icon ? $icon : 'fa-solid fa-question';
@endphp

<a {{ $attributes->merge(['class' => 'block text-gray-400 transition hover:cursor-pointer ' . $classes]) }}>
    <div class="flex items-center justify-between">
        <div class="flex items-center truncate" :class="sidebarExpanded ? 'lg:mx-auto' : 'lg:mx-0'">
            <span class="{{ $active ? 'text-blue-800' : '' }} duration-200">
                <i class="{{ $classIcon }} fa-fw"></i>
            </span>

            <span class="text-xs ml-2 2xl:opacity-100 duration-200 truncate {{ $active ? 'font-normal' : '' }}"
                :class="sidebarExpanded ? 'lg:hidden' : 'lg:block'">
                {{ $slot }}
            </span>
        </div>
        <!-- Icon -->
        <div class="flex shrink-0 ml-2 2xl:opacity-100 duration-200" :class="sidebarExpanded ? 'lg:hidden' : 'lg:flex'">

            <span class="ml-1 text-gray-500" :class="open ? 'rotate-180' : 'rotate-0'">
                <i
                    class="fa-solid fa-chevron-down fa-xs @if ($active) {{ 'rotate-0' }} @endif"></i>
            </span>
        </div>
    </div>
</a>
