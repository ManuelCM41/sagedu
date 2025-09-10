@props(['route' => 'ver.inicio', 'icon', 'title', 'breadcrumbs' => []])

<x-card>
    <div class="flex items-center gap-1">
        <div class="flex gap-1">
            <a wire:navigate href="{{ route($route) }}">
                <x-button-gradient color="sky" class="!p-3 !px-2.5 !rounded-full text-xs">
                    <i class="fa-solid fa-arrow-left fa-fw"></i>
                </x-button-gradient>
            </a>
            @if ($icon)
                <x-button-gradient color="blue" class="!p-3 !px-2.5 !rounded-full text-xs">
                    <i class="{{ $icon }} fa-fw"></i>
                </x-button-gradient>
            @endif

        </div>
        <x-breadcrumb-header :title="$title" :items="$breadcrumbs" />
    </div>
</x-card>
