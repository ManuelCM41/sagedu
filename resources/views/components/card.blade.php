@props([
    'borderTop' => false,
    'title' => '',
    'class' => '',
])

@php
    $borderColor = $borderTop ? 'border-t-[6px] border-t-blue-900' : '';
@endphp

<div
    {{ $attributes->merge([
        'class' => "relative h-max p-3 bg-white rounded-lg shadow-lg {$borderColor} {$class}",
    ]) }}>
    <div class="space-y-3">
        @if ($title)
            <div class="py-2 bg-blue-950 text-center text-sm text-white font-medium uppercase -mt-4 -mx-3 rounded-t-lg">
                {{ $title }}
            </div>
        @endif

        {{ $slot }}
    </div>
</div>
