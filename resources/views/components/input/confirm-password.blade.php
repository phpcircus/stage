@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-input border-skin-separator/50 focus:border-transparent focus:ring focus:ring-skin-input-primary rounded-md shadow-sm']) !!}>
