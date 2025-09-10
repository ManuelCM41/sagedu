@props([
    'show' => false,
])

<div x-data="{ open: @entangle($attributes->wire('model')) }" x-cloak>
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/40 z-50 transition-opacity" x-show="open" x-transition.opacity
        @click="open = false"></div>

    <!-- Sidebar -->
    <div class="fixed top-0 right-0 w-full lg:w-[45vw] md:w-[55vw] h-full bg-white shadow-xl z-50 transform transition-transform"
        x-show="open" x-transition:enter="transition ease-in-out duration-300" x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300"
        x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">
        <!-- Header -->
        <div class="sticky top-0 left-0 w-full flex items-center bg-zinc-100 border-b border-gray-300 px-4 h-[4.5rem]">
            <div class="flex items-center justify-between w-full">
                <div>
                    {{ $title ?? '' }}
                </div>
                <button @click="open = false" class="text-gray-500 hover:text-gray-800">
                    <i class="fa-solid fa-xmark fa-lg"></i>
                </button>
            </div>
        </div>

        <!-- Content -->
        <div class="p-4 overflow-y-auto h-[calc(100%-9rem)]">
            {{ $slot }}
        </div>

        <div
            class="sticky bottom-0 left-0 w-full flex items-center justify-end gap-2 bg-zinc-100 border-t border-gray-300 px-4 h-[4.5rem]">
            {{ $footer ?? '' }}
        </div>
    </div>
</div>
