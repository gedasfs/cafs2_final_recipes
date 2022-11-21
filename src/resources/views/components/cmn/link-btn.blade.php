@props([
    'outlined' => false,
    'color' => 'primary'
])

<a {{ $attributes
    ->class(['rounded-5', 'btn', 'btn-' . ($outlined ? 'outline-' : '') . $color])
    ->merge(['href' => '#']) }}>
{{ $slot }}
</a>
