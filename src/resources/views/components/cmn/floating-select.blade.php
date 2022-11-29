@props(['id', 'type' => 'text'])

<div class="form-floating mb-3">
    <select {{
        $attributes->merge([
            'class' => 'form-select',
            'id' => $id,
        ])
    }}>
        <option selected disabled>{{ $firstSelectName }}</option>
        {{ $options }}
    </select>
    <label for="{{ $id }}">{{ $slot }}</label>
</div>
