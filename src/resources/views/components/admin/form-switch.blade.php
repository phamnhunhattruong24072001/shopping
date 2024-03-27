@props([
    'for',
    'title' => null,
    'type' => 'checkbox',
    'name',
    'value' => '',
])

<div>
    <div class="form-group">
        <input
            name="{{ $name }}"
            type="{{ $type }}"
            id="{{ $for }}"
            {{ $attributes->merge(['class' => 'js-switch']) }}
            value="{{ $value }}"
        />
        {{ $title ?? '' }}

        @error($name)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
