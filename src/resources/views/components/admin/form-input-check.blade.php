@props([
    'for',
    'title',
    'type' => 'checkbox',
    'name',
    'value' => null,
])

<div>
    <div class="form-group">
        <label class="form-label-check" for="{{ $for }}">{{ $title }}</label>
        <input
            type="{{ $type }}"
            id="{{ $for }}"
            {{ $attributes->merge(['class' => 'flat']) }}
            value="{{ $value }}"
        />
        @error($name)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
