<x-button
    {{ $attributes->merge([
        'class' => 'font-bold text-white bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-700 border-indigo-600
            dark:text-gray-900 dark:bg-indigo-400 dark:hover:bg-indigo-300 dark:active:bg-indigo-500 dark:border-indigo-400 dark:hover:text-gray-700'
    ]) }}>
    {{ $slot }}
</x-button>
