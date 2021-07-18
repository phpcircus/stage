@props([
    'leadingAddOn' => false,
])

@php
    $padding = $leadingAddOn ? 'pl-10' : 'pl-3';
@endphp

<div class="flex mt-1 rounded-md shadow-sm">
    <div class="relative flex items-stretch flex-grow focus-within:z-10">
        @if ($leadingAddOn)
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                {{ $leadingAddOn }}
            </div>
        @endif
        <input type="text"
            {{ $attributes->merge([
                'class' => "block w-full {$padding} border-gray-300 rounded-r-md focus:ring-indigo-500 focus:border-indigo-500 rounded-l-md sm:text-sm"
            ]) }}
            tabindex="0" x-ref="field" x-bind:value="value" autocomplete="off"
            type="text">
    </div>
</div>