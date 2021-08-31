@props([
    'trailingAddOn' => false,
    'type' => 'submit',
])
<x-button type="{{ $type }}"
    {{ $attributes->merge([
    'class' => '!border-transparent text-base !font-semibold !text-white !bg-indigo-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:!ring-indigo-600 hover:ring-2 hover:ring-offset-2 hover:ring-offset-white hover:!ring-indigo-600',
]) }}>
    {{ $slot }}
    @if ($trailingAddOn)
        {{ $trailingAddOn }}
    @endif
</x-button>
