@props([
    'outlined' => false,
    'color' => 'primary'
])

<button {{ $attributes
    ->class(['rounded-5', 'btn', 'btn-' . ($outlined ? 'outline-' : '') . $color])
    ->merge(['type' => 'button']) }}
>
    {{ $slot }}
</button>
