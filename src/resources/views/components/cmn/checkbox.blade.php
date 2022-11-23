@props(['id'])

<div class="form-check">
    <input
        {{
            $attributes->merge([
                'class' => 'form-check-input',
                'id' => $id,
            ])
        }}
    type="checkbox""
    >
    <label class="form-check-label" for="{{ $id }}">{{ $slot }}</label>
</div>
