@props(['active', 'expanded'])

@php
    $classes =
        $active ?? false
            ? '!text-gray-900'
            : ($expanded && !$active
                ? '!text-gray-500 hover:!text-gray-900'
                : '!text-gray-400 hover:!text-gray-200');
@endphp

<li class="mb-1.5 last:mb-0">
    <a {{ $attributes->merge(['class' => 'block transition truncate ' . $classes]) }} wire:navigate>
        <div class="flex items-center truncate">
            <i class="fa-xs fa-fw {{ $active ? 'fa-solid fa-circle text-gray-900' : 'fa-regular fa-circle' }}"></i>
            <span class="text-xs ml-3 duration-200 {{ $active ? 'font-medium' : '' }}">{{ $slot }}</span>
        </div>

    </a>
</li>
