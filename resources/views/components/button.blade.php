@props([
    'type' => 'button',
])
<button
    {{ $attributes->merge([
        'type' => $type,
        'class' => 'inline-flex items-center px-4 py-2 border border-indigo-400 shadow-sm text-sm font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-400 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-offset-2 focus:ring-indigo-400' . ($attributes->get('disabled') ? ' opacity-75 cursor-not-allowed' : ''),
]) }}>
    {{ $slot }}
</button>
