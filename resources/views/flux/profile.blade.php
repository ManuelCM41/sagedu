@pure

@php $iconVariant ??= $attributes->pluck('icon:variant'); @endphp
@php $iconTrailing ??= $attributes->pluck('icon:trailing'); @endphp

@props([
    'iconVariant' => 'micro',
    'iconTrailing' => null,
    'initials' => null,
    'chevron' => true,
    'circle' => null,
    'avatar' => null,
    'name' => null,
])

@php
    $iconTrailing = $iconTrailing ?? ($chevron ? 'chevron-down' : null);

    // When using the outline icon variant, we need to size it down to match the default icon sizes...
    $iconClasses = Flux::classes(
        'text-zinc-400 dark:text-white/80 group-hover:text-zinc-100 dark:group-hover:text-white',
    )->add($iconVariant === 'outline' ? 'size-4' : '');

    $classes = Flux::classes()
        ->add('group flex items-center')
        ->add('rounded-lg has-data-[circle=true]:rounded-full')
        ->add('[ui-dropdown>&]:w-full') // Without this, the "name" won't get truncated in a sidebar dropdown...
    ->add('p-1 hover:bg-zinc-100/10 active:bg-zinc-100/20 dark:hover:bg-white/10');
@endphp

<button type="button" {{ $attributes->class($classes) }} data-flux-profile>
    <div class="shrink-0">
        <?php if ($avatar instanceof \Illuminate\View\ComponentSlot): ?>
        {{ $avatar }}
        <?php else: ?>
        <flux:avatar
            :attributes="Flux::attributesAfter('avatar:', $attributes, ['src' => $avatar, 'size' => 'lg', 'circle' => $circle,
                'name' => $name, 'initials' => $initials
            ])" />
        <?php endif; ?>
    </div>

    <?php if ($name): ?>
    <span
        class="mx-2 text-sm text-left text-white dark:text-white/80 group-hover:text-zinc-100 dark:group-hover:text-white truncate lg:block hidden">
        {{ $name }}
        <div class="text-yellow-400 uppercase">
            {{ Auth::user()->roles->first()->name ?? 'Sin rol asignado' }}
        </div>
    </span>
    <?php endif; ?>

    <?php if (is_string($iconTrailing) && $iconTrailing !== ''): ?>
    <div class="shrink-0 ms-auto size-8 flex justify-center items-center">
        <flux:icon :icon="$iconTrailing" :variant="$iconVariant" :class="$iconClasses" />
    </div>
    <?php elseif ($iconTrailing): ?>
    {{ $iconTrailing }}
    <?php endif; ?>
</button>
