@props([
    'for',
    'title',
    'name',
    'value' => '',
])

<div>
    <div class="form-group">
        <label class="form-label" for="{{ $for }}">{{ $title }}</label>
        <textarea id="{{ $for }}" name="{{ $name }}" {{ $attributes->merge(['class' => 'form-control' . ($errors->has($name) ? 'parsley-error' : '')]) }} cols="4" rows="3">{{ $value }}</textarea>
        @error($name)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
