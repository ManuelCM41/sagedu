@props([
    'color' => 'gray',
    'disabled' => false,
    'class' => '',
    'type' => 'button',
])

@php
    $colorClasses = [
        'blue' =>
            'from-blue-950 to-blue-800 shadow-blue-900/20 hover:shadow-blue-900/40 active:from-blue-950 active:to-blue-950',
        'cyan' => 'from-cyan-700 to-cyan-300 shadow-cyan-500/20 hover:shadow-cyan-500/40',
        'sky' =>
            'from-sky-600 to-sky-400 shadow-sky-500/20 hover:shadow-sky-500/40 active:from-sky-600 active:to-sky-600',
        'gray' =>
            'from-black to-gray-800 shadow-gray-700/20 hover:shadow-gray-700/40 active:from-gray-900 active:to-gray-700',
        'green' =>
            'from-green-700 to-green-400 shadow-green-700/0 hover:shadow-green-500/40 active:from-green-700 active:to-green-700',
        'indigo' => 'from-indigo-700 to-indigo-300 shadow-indigo-500/20 hover:shadow-indigo-500/40',
        'lime' => 'from-lime-700 to-lime-300 shadow-lime-500/20 hover:shadow-lime-500/40',
        'orange' =>
            'from-orange-700 to-orange-400 shadow-orange-500/20 hover:shadow-orange-500/40 active:from-orange-700 active:to-orange-700',
        'purple' => 'from-purple-700 to-purple-300 shadow-purple-500/20 hover:shadow-purple-500/40',
        'pink' => 'from-pink-700 to-pink-300 shadow-pink-500/20 hover:shadow-pink-500/40',
        'red' => 'from-red-800 to-red-500 shadow-red-500/20 hover:shadow-red-500/40',
        'teal' => 'from-teal-700 to-teal-300 shadow-teal-500/20 hover:shadow-teal-500/40',
        'yellow' =>
            'from-yellow-600 to-yellow-500/80 shadow-yellow-500/20 hover:shadow-yellow-500/40 active:from-yellow-600 active:to-yellow-600',
    ];

    $gradient = $colorClasses[$color] ?? $colorClasses['gray'];

    $buttonClasses = "flex items-center justify-center gap-1.5 rounded-lg bg-gradient-to-tr lg:w-auto w-auto h-max
        py-[0.688rem] px-3 text-xs -tracking-tighter uppercase text-white shadow transition-all hover:shadow-lg hover:cursor-pointer
        {$gradient} disabled:opacity-50 disabled:!cursor-not-allowed";

    if ($disabled) {
        $buttonClasses .= ' pointer-events-none opacity-60 shadow-none';
    }
@endphp

<button type="{{ $type }}" {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge(['class' => $buttonClasses . ' ' . $class]) }}>
    {{ $slot }}
</button>
