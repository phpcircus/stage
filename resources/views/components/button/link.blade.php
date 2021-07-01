<button
    {{ $attributes->merge([
    'type' => 'button',
    'class' => 'text-gray-700 dark:text-gray-300 leading-4 text-base leading-5 font-medium focus:outline-none focus:text-gray-800 focus:underline transition
        hover:text-gray-400 dark:hover:text-gray-500 duration-150 ease-in-out' . ($attributes->get('disabled') ? ' opacity-75 cursor-not-allowed' : ''),
]) }}>
    {{ $slot }}
</button>
