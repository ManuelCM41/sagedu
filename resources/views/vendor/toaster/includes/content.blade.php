<div class="relative z-50 px-5 py-3 overflow-hidden duration-300 border-t border-l-4 rounded-lg shadow-xl cursor-pointer pointer-events-auto select-none "
    x-bind:class="{
        'border-blue-500 bg-blue-50': toast.type === 'info',
        'border-green-500 bg-green-50': toast.type === 'success',
        'border-orange-500 bg-orange-50': toast.type === 'warning',
        'border-red-500 bg-red-50': toast.type === 'error'
    }">
    <div class="flex items-center divide-x-2">
        <div class="flex items-center justify-center pr-3 w-9 h-9">
            @include('vendor.toaster.includes.icon')
        </div>

        <div class="flex flex-col pl-3 text-sm">
            <span class="font-medium text-zinc-800"
                x-text="{
                            error: 'Mensaje de error',
                            info: 'Mensaje de información',
                            success: 'Mensaje de éxito',
                            warning: 'Mensaje de advertencia'
                        }[toast.type]"></span>
            <span class="text-xs text-gray-700 max-w-64" x-show="toast.message !== undefined"
                x-html="toast.message"></span>
        </div>
    </div>

    @if ($closeable)
        <button @click="toast.dispose()" aria-label="@lang('close')"
            class="absolute right-0 p-2 focus:outline-none focus:outline-hidden rtl:right-auto rtl:left-0 {{ $alignment->is('bottom') ? 'top-3' : 'top-0' }}">
            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    @endif
</div>
