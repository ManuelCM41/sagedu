@php
    $options = $options ?? [];
    $value = $value ?? null;
    $placeholder = $placeholder ?? 'Seleccione...';
    $label = $label ?? null;
    $eventName = $eventName ?? 'dropdownChanged';
@endphp

<div x-data='dropdownComponent(@json($options), @json($value), @json($placeholder), "{{ $eventName }}")'
    @click.outside="open = false" class="relative w-full">
    <!-- Botón dropdown -->
    <button type="button" @click="toggle()" @focus="focused = true" @blur="focused = false"
        class="w-full px-3 py-2.5 text-xs text-left bg-white border border-gray-300 rounded-lg hover:border-blue-800 focus:outline-none flex justify-between items-center">
        <span x-text="selected?.label || placeholder"></span>
        <i :class="open ? 'rotate-180' : 'rotate-0'"
            class="fa-solid fa-chevron-down fa-fw text-gray-500 ml-2 transition-transform duration-200 transform"></i>
    </button>

    <!-- Label flotante -->

    @if (isset($label))
        <label
            class="absolute left-3 text-gray-700 text-xs transition-all duration-200 px-1 rounded-full bg-white
        pointer-events-none"
            :class="focused || selected ? '-top-[0.45rem] !text-blue-900' : 'top-[0.688rem] text-sm'">
            {{ $label }}
        </label>
    @endif


    <!-- Lista de opciones -->
    <div x-show="open" x-transition class="absolute z-30 min-w-full mt-1 rounded-lg">
        <ul @scroll="handleScroll"
            class="overflow-x-hidden overflow-y-auto bg-white border border-gray-300 rounded-lg shadow-lg custom-scrollbar2 text-zinc-700 max-h-60">
            <template x-for="(option, index) in options" :key="index">
                <li @click="select(option)"
                    :class="selected?.value === option.value ? '!bg-blue-900 font-medium text-white' : ''"
                    class="px-2.5 py-1.5 text-xs cursor-pointer hover:bg-gray-100">
                    <span x-text="option.label"></span>
                </li>
            </template>
        </ul>
    </div>
</div>

<script>
    function dropdownComponent(options = [], value = null, placeholder = 'Seleccione...', eventName =
        'dropdownChanged') {
        return {
            open: false,
            focused: false,
            options: options,
            selected: value,
            placeholder: placeholder,

            toggle() {
                this.open = !this.open;
            },

            select(option) {
                this.selected = option;
                this.open = false;

                // Emitir evento Livewire personalizado por dropdown
                window.Livewire.dispatch(eventName, [option.value]);
            },

            handleScroll(event) {
                // Si necesitas emitir scroll, aquí puedes hacerlo
            }
        };
    }
</script>
