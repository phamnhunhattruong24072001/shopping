@props([
    'for',
    'title',
    'type' => 'text',
    'name',
    'value'
])

<div>
    <div class="form-group">
        <label class="form-label" for="{{ $for }}">{{ $title }}</label>
        <input
            type="{{ $type }}"
            id="{{ $for }}"
            {{ $attributes->merge(['class' => 'boostrap-tag-input form-control' . ($errors->has($name) ? 'is-invalid' : '')]) }}
            value="{{ $value }}"
        />
        @error($name)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
