<div class="form-group">
    <label for="{{ $name }}">{{ $title }}</label>
    <input name="{{ $name }}" type="{{ $type }}" {{ $attributes->merge(['class' => $errors->has($name) ? 'in-valid' : '']) }}>
    @error($name)
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
