@props(['color'])

@php
    $color = [
        'slate' => 'border border-slate-500 bg-slate-500 hover:bg-slate-600 active:bg-slate-500',
        'gray' => 'border border-gray-500 bg-gray-500 hover:bg-gray-600 active:bg-gray-500',
        'zinc' => 'border border-zinc-500 bg-zinc-500 hover:bg-zinc-600 active:bg-zinc-500',
        'neutral' => 'border border-neutral-500 bg-neutral-500 hover:bg-neutral-600 active:bg-neutral-500',
        'stone' => 'border border-stone-500 bg-stone-500 hover:bg-stone-600 active:bg-stone-500',
        'red' => 'border border-red-500 bg-red-500 hover:bg-red-600 active:bg-red-500',
        'orange' => 'border border-orange-500 bg-orange-500 hover:bg-orange-600 active:bg-orange-500',
        'amber' => 'border border-amber-500 bg-amber-500 hover:bg-amber-600 active:bg-amber-500',
        'yellow' => 'border border-yellow-500 bg-yellow-500 hover:bg-yellow-600 active:bg-yellow-500',
        'lime' => 'border border-lime-500 bg-lime-500 hover:bg-lime-600 active:bg-lime-500',
        'green' => 'border border-green-500 bg-green-500 hover:bg-green-600 active:bg-green-500',
        'emerald' => 'border border-emerald-500 bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-500',
        'teal' => 'border border-teal-500 bg-teal-500 hover:bg-teal-600 active:bg-teal-500',
        'cyan' => 'border border-cyan-500 bg-cyan-500 hover:bg-cyan-600 active:bg-cyan-500',
        'sky' => 'border border-sky-500 bg-sky-500 hover:bg-sky-600 active:bg-sky-500',
        'blue' => 'border border-blue-900 bg-blue-900 hover:bg-blue-950 active:bg-blue-900',
        'indigo' => 'border border-indigo-500 bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-500',
        'violet' => 'border border-violet-500 bg-violet-500 hover:bg-violet-600 active:bg-violet-500',
        'purple' => 'border border-purple-500 bg-purple-500 hover:bg-purple-600 active:bg-purple-500',
        'fuchsia' => 'border border-fuchsia-500 bg-fuchsia-500 hover:bg-fuchsia-600 active:bg-fuchsia-500',
        'pink' => 'border border-pink-500 bg-pink-500 hover:bg-pink-600 active:bg-pink-500',
        'rose' => 'border border-rose-500 bg-rose-500 hover:bg-rose-600 active:bg-rose-500',
        'transparent' => 'bg-transparent hover:bg-zinc-100/10 active:bg-zinc-100/20 ',
    ][$color ?? 'blue'];
@endphp

<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'hover:cursor-pointer inline-flex items-center justify-center px-4 py-2.5 rounded-md text-white font-medium focus:outline-none disabled:opacity-50 transition ease-in-out duration-150' . $color]) }}>
    {{ $slot }}
</button>
