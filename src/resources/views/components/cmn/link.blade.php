<a {{ $attributes
        ->class(['link-primary', 'text-decoration-none'])
        ->merge(['href' => '#']) }}
>{{ $slot }}</a>
