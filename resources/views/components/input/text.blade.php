@props([
    'leadingAddOn' => false,
    'type' => 'text',
    'focus' => false,
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
        <input x-data="{ focused: {{ json_encode($focus) }} }" x-init="focused && setTimeout(() => $el.focus(), 250)"
               type="{{ $type }}" {!! $attributes->merge([
                    'class' => "form-input block w-full {$padding} shadow-sm border border-gray-300 rounded-r-md focus:outline-none focus:border-transparent focus:ring-2 focus:ring-indigo-500 dark:ring-indigo-300 rounded-l-md sm:text-sm"
                ]) !!}
                tabindex="0"
                autocomplete="off">
    </div>
</div>
