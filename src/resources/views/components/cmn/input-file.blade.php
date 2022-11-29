@props(['id' => false, 'name'])

<div class="mb-3">
    <label @class(['form-label'])
        @if ($id)
            for="{{ $id }}"
        @endif
    >{{ $slot }}</label>
    <input
        {{
            $attributes->merge([
                'class' => 'form-control',
                'type' => 'file',
                'id' => $id,
                'name' => $name,
                // 'placeholder' => $slot,
            ])
        }}
    >
</div>
