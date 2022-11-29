@props(['id' => false, 'type' => 'text'])

<div class="form-floating mb-3">
    <input
        {{
            $attributes->merge([
                'class' => 'form-control',
                'type' => $type,
                'id' => $id,
                'placeholder' => $slot,
            ])
        }}
    >
    <label
        @if ($id)
            for="{{ $id }}"
        @endif
    >{{ $slot }}</label>
</div>