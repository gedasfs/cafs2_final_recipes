@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'text-info']) }}>
        {{ $status }} bla
    </div>
@endif
