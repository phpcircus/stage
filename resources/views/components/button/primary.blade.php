<x-button
    {{ $attributes->merge([
        'class' => 'group dark:ring-gray-800 dark:ring-white border-none relative text-gray-800 dark:text-white bg-transparent outline-none flex text-base font-semibold leading-4
            text-center cursor-pointer rounded-lg pt-3 px-6 pb-3 shadow-md dark:shadow-small-dark ring-1 transition-shadow hover:ring-2 ring-gray-800 focus:outline-none
            active:outline-none dark:hover:ring-white hover:outline-none hover:transition-shadow hover:shadow-none'
    ]) }}>
    {{ $slot }}
    <x-heroicon-o-chevron-right class="h-4 ml-2 text-gray-800 dark:text-white group-hover:hidden"></x-heroicon-chevron-right>
    <x-heroicon-o-arrow-right class="hidden h-4 ml-2 text-gray-800 dark:text-white group-hover:inline-block"></x-heroicon-chevron-right>
</x-button>
