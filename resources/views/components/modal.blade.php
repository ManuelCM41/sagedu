@props([
    'show' => false,
    'maxWidth' => 'lg', // ancho máximo configurable
    'bgColor' => 'bg-white',
])

<div x-data="{ openModal: @entangle($attributes->wire('model')) }" x-cloak>
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/40 z-40 transition-opacity" x-show="openModal" x-transition.opacity>
    </div>

    <!-- Modal -->
    <div class="fixed inset-0 z-50 flex items-center justify-center p-4 pointer-events-none" x-show="openModal"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">

        <!-- Caja del modal -->
        <div
            class="w-full max-w-{{ $maxWidth }} {{ $bgColor }} rounded-lg shadow-xl mx-auto my-2 pointer-events-auto">

            <!-- Header -->
            <div
                class="sticky top-0 left-0 w-full flex items-center border-b  px-4 h-[4.5rem] rounded-t-lg {{ $bgColor == 'bg-white' ? 'bg-zinc-100 border-gray-300' : 'text-white border-gray-500' }}">
                <div class="flex items-center justify-between w-full">
                    <div>
                        {{ $title ?? '' }}
                    </div>
                    <button @click="openModal = false"
                        class=" {{ $bgColor == 'bg-white' ? 'text-gray-500 hover:text-gray-800' : 'text-zinc-300 hover:text-zinc-100' }}">
                        <i class="fa-solid fa-xmark fa-lg"></i>
                    </button>
                </div>
            </div>

            <!-- Content -->
            <div class="px-4 py-3 max-h-[calc(100vh-11rem)] overflow-y-auto">
                {{ $slot }}
            </div>

            <!-- Footer -->
            <div
                class="sticky bottom-0 left-0 w-full rounded-b-lg flex items-center justify-end gap-2 border-t px-4 h-[4.5rem] {{ $bgColor == 'bg-white' ? 'bg-zinc-100 border-gray-300' : 'text-white border-gray-500' }}">
                {{ $footer ?? '' }}
            </div>
        </div>
    </div>
</div>
