@props([
    'class' => '',
])

<tbody class="text-xs divide-y divide-gray-300 text-gray-700 {{ $class }}">{{ $slot }}</tbody>
