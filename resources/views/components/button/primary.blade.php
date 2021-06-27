<x-button
    {{ $attributes->merge([
        'class' => 'font-bold
            text-blue-600 dark:text-blue-400 hover:text-white dark:hover:text-white
            bg-transparent hover:bg-blue-600 dark:hover:bg-blue-400
            border-2 border-blue-600 dark:border-blue-400 hover:border-transparent
            shadow-attention hover:shadow-none'
    ]) }}>
    {{ $slot }}
</x-button>
