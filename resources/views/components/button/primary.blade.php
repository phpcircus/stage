@props([
'trailingAddOn' => false,
'type' => 'submit',
])
<x-button type="{{ $type }}" {{ $attributes->merge([
    'class' => '!border-transparent text-base !font-semibold !text-white dark:hover:!text-slate-200 !bg-slate-600 dark:!bg-slate-800 rounded-md shadow-sm
    focus:outline-none focus:ring-2
    focus:ring-offset-2 focus:ring-offset-white dark:focus:!ring-offset-slate-800 dark:!border-2 dark:!border-white focus:!ring-slate-600 dark:focus:!ring-white
    hover:ring-2 hover:ring-offset-2 hover:ring-offset-white dark:hover:!ring-offset-slate-800 hover:!ring-slate-600 dark:hover:!ring-white',
    ]) }}>
    {{ $slot }}
    @if ($trailingAddOn)
    {{ $trailingAddOn }}
    @endif
</x-button>
