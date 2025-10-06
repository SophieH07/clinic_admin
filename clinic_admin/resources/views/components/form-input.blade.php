@props(['name', 'label', 'type' => 'text', 'value' => ''])

<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}"
        {{ $attributes->merge(['class' => 'form-control']) }}>
    @error($name)
        <span style="color: red; font-size: 0.9em;">{{ $message }}</span>
    @enderror
</div>
