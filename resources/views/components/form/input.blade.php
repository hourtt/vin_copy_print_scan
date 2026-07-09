@props(['name', 'label', 'type' => 'text', 'required' => false, 'value' => ''])

<div>
    <label class="block text-sm font-medium mb-1">{{ $label }} @if($required)<span class="text-red-500">*</span>@endif</label>
    <input type="{{ $type }}" name="{{ $name }}" @if($required) required @endif
        value="{{ $value }}" class="form-input" {{ $attributes }}>
</div>
