@props([
    'orden' => null,
    'class' => '',
])

@php
    $roleColors = [
        1 => 'rounded-md text-green-500 bg-green-500/20',
        2 => 'rounded-md text-blue-500 bg-blue-500/20',
        3 => 'rounded-md text-orange-500 bg-orange-500/20',
        4 => 'rounded-md text-indigo-500 bg-indigo-500/20',
        5 => 'rounded-md text-yellow-600 bg-yellow-500/20', // no hay 'brown-500'
        6 => 'rounded-md text-purple-500 bg-purple-500/20',
        7 => 'rounded-md text-emerald-500 bg-emerald-500/20',
        8 => 'rounded-md text-gray-600 bg-gray-500/20',
        9 => 'rounded-md text-sky-600 bg-sky-500/20',
        null => 'rounded-md text-red-500 bg-red-500/20',
    ];

    $classes =
        'flex items-center justify-center gap-1 w-max px-2 py-1 text-xs font-normal uppercase ' .
        ($roleColors[$orden] ?? '');
@endphp

<div {{ $attributes->merge(['class' => $classes . ' ' . $class]) }}>
    {{ $slot }}
</div>
