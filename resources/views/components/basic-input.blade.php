@props([
    'type' => '',
    'id' => '',
    'name' => '',
    'value' => '',
    'required' => false, 
    'disabled' => false,
    'readonly' => false
])

<input type="{{ $type ?? 'text' }}"
    id="{{ $id }}" 
    name="{{ $name }}" 
    value="{{ $value }}"
    @if($required) required @endif 
    @if($disabled) disabled @endif 
    @if($readonly) readonly @endif 
    class="{{ $readonly || $disabled ? 'bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5' }}"
/>