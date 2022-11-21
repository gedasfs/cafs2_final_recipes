@props(['notOutlined' => false])

<a {{ $attributes
    ->class(['btn', 'btn-outline-primary' => !$notOutlined, 'btn-primary' => $notOutlined, 'rounded-5', 'px-5', 'px-lg-4'])
    ->merge(['href' => '#']) }}>
{{ $slot }}
</a>
