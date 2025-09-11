@props([
    'disabled' => false,
    'for' => '',
    'label',
    'eye' => false,
    'search' => false,
    'icon' => null, // clase FontAwesome ej: "fa-solid fa-user"
    'iconRight' => false, // true = ícono a la derecha
    'type' => 'text',
    'placeholder' => null,
])

@php
    $hasIconRight = $icon && $iconRight;
    $hasIconLeft = $icon && !$iconRight;

    $classEye = $eye && $type === 'password' ? 'pl-3 pr-10' : 'px-3';
    $classIcon = $hasIconLeft ? 'pl-10 pr-3' : ($hasIconRight ? 'pl-3 pr-10' : $classEye);

    // label arriba siempre si hay placeholder
    $forceLabelUp = $placeholder ? true : false;

    $borderTop = !empty($label) ? 'border-t-transparent' : 'border-t-gray-400';

@endphp

<div {!! $attributes->merge(['class' => 'relative p-0 border-none']) !!} x-data="{ show: false }">
    <div class="relative w-full h-10">
        <input {{ $disabled ? 'disabled' : '' }}
            x-bind:type="show && '{{ $type }}'
            === 'password' ? 'text' : '{{ $type }}'"
            {!! $attributes->merge([
                'class' =>
                    'w-full h-full ' .
                    $classIcon .
                    $borderTop .
                    ' py-3 text-xs bg-transparent border rounded-md peer focus:ring-0 border-gray-400 text-gray-700 outline-none placeholder-shown:border placeholder-shown:border-gray-400 focus:border-blue-700 focus:border-1 focus:border-t-transparent focus:outline-none disabled:bg-gray-100',
            ]) !!} placeholder=" " />

        @if (isset($label))
            <label
                class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-[0.47rem] flex h-full w-full select-none !overflow-visible truncate text-[0.688rem] font-normal leading-tight text-gray-700 transition-all
        before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-gray-400
        after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-gray-400
        peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-gray-700 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent
        peer-focus:!pl-0 peer-focus:text-[0.688rem] peer-focus:leading-tight peer-focus:text-blue-800 peer-focus:before:border-blue-700 peer-focus:after:border-blue-700 peer-focus:before:border-t peer-focus:after:border-t
        {{ $hasIconLeft ? 'peer-placeholder-shown:!pl-7 ' : 'peer-placeholder-shown:!pl-0 ' }}">
                {{ $label }}
            </label>
        @endif

        <!-- Icono izquierda -->
        @if ($hasIconLeft)
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-600 pointer-events-none">
                <i class="{{ $icon }} fa-fw"></i>
            </div>
        @endif

        @if ($eye && $type === 'password')
            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                <button type="button" @click="show = !show" class="text-gray-600 focus:outline-none focus:ring-0">
                    <i :class="show ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye'"></i>
                </button>
            </div>
        @endif

        @if ($search)
            <div class="absolute grid w-5 h-5 text-gray-600 top-2/4 right-3 -translate-y-2/4 place-items-center">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        @endif
    </div>
    @unless (!empty(${$for}))
        @error($for)
            <div class="mt-1 text-xs text-red-500">
                {{ $message }}
            </div>
        @enderror
    @endunless

    {{ $slot }}
</div>
