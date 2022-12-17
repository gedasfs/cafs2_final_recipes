@props(['id', 'type' => 'text', 'error' => ''])

<div class="form-floating mb-3">
    <select {{
        $attributes->merge([
            'class' => 'form-select',
            'id' => $id,
        ])->class(['is-invalid' => $error])
    }}
    @if ($error)
        data-bs-toggle="tooltip"
        data-bs-placement="top"
        data-bs-title="{{ $error }}"
    @endif
    >
        <option selected disabled>{{ $firstSelectName }}</option>
        {{ $options }}
    </select>
    <label for="{{ $id }}">{{ $slot }}</label>
</div>
