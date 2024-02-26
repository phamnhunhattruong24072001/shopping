@props([
    'for',
    'title',
    'name',
])

<div>
    <div class="form-group">
        <label class="form-label" for="{{ $for }}">{{ $title }}</label>
        <select
            name="{{ $name }}"
            {{ $attributes->merge(['class' => 'form-control' . ($errors->has($name) ? 'is-invalid' : '') . ' ' . ($attributes->has('multiple') ? 'select2-multiple' : 'select2-single')]) }}
        >
            {{ $slot }}
        </select>
        @error($name)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
