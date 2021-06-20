<div class="flex items-center">
    {{ $slot }}

    <div x-data="{ focused: false }">
        <span class="ml-5 rounded-md shadow-sm">
            <input @focus="focused = true" @blur="focused = false" class="sr-only" tabindex="-1" type="file" {{ $attributes }}>
            <label for="{{ $attributes['id'] }}"
                :class="{ 'outline-none border-blue-300 shadow-outline-blue': focused }"
                class="px-3 py-2 text-sm font-medium leading-4 text-gray-700 transition duration-150 ease-in-out border border-gray-400 rounded-md cursor-pointer dark:text-gray-300 hover:text-gray-500 active:bg-gray-50 dark:hover:text-gray-400 dark:active:text-gray-400 dark:hover:border-gray-400">
                Select File
            </label>
        </span>
    </div>
</div>
