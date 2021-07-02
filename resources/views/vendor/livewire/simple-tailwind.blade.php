<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
            <span>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span class="inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-500 bg-white border border-gray-300 rounded-md cursor-default dark:text-gray-300 dark:bg-gray-700 dark:border-gray-900">
                        {!! __('pagination.previous') !!}
                    </span>
                @else
                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev"
                        class="inline-flex items-center px-4 py-2 text-sm font-semibold leading-5 text-gray-500 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:border-transparent focus:outline-none hover:text-gray-400 dark:text-gray-300 dark:hover:text-gray-400 dark:bg-gray-700 dark:border-gray-900 dark:hover:border-transparent"
                    :class="$store.stage.darkMode ? 'text-gray-300 hover:text-gray-600 bg-gray-700 border border-gray-900 hover:border-gray-600' : 'text-gray-500 bg-white border border-gray-300'">
                        {!! __('pagination.previous') !!}
                    </button>
                @endif
            </span>

            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next"
                        class="inline-flex items-center px-4 py-2 text-sm font-semibold leading-5 text-gray-500 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:border-transparent focus:outline-none hover:text-gray-400 dark:text-gray-300 dark:hover:text-gray-400 dark:bg-gray-700 dark:border-gray-900 dark:hover:border-transparent">
                        {!! __('pagination.next') !!}
                    </button>
                @else
                    <span class="inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-500 bg-white border border-gray-300 rounded-md cursor-default dark:text-gray-300 dark:bg-gray-700 dark:border-gray-900">
                        {!! __('pagination.next') !!}
                    </span>
                @endif
            </span>
        </nav>
    @endif
</div>
