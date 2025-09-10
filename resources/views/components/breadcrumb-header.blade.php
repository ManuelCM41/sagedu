@props(['title', 'items' => []])

<div>
    <div class="text-sm font-medium">
        {{ $title }}
    </div>
    <p class="text-[0.688rem] text-gray-500 flex items-center">
        @foreach ($items as $index => $item)
            <span class="flex items-center">
                {{ $item }}
                @if ($index < count($items) - 1)
                    <i class="fa-solid fa-chevron-right mx-1 text-gray-400 text-[0.565rem]"></i>
                @endif
            </span>
        @endforeach
    </p>
</div>
