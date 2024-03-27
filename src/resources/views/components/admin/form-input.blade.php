@props([
    'for',
    'title',
    'type' => 'text',
    'name',
    'value' => '',
])

<div>
    <div class="form-group">
        <label class="form-label" for="{{ $for }}">{{ $title }}</label>
        <input
            name="{{ $name }}"
            type="{{ $type }}"
            id="{{ $for }}"
            {{ $attributes->merge(['class' => 'form-control' . ($errors->has($name) ? 'parsley-error' : '')]) }}
            value="{{ $value }}"
        />
        @error($name)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
