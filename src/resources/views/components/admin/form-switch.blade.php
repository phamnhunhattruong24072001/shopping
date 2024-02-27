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
            type="{{ $type }}"
            id="{{ $for }}"
            {{ $attributes->merge(['class' => 'js-switch' . ($errors->has($name) ? 'is-invalid' : '')]) }}
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
