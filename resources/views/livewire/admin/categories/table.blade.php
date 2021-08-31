<div id="categories-table" class="flex flex-col">
    <div class="pt-6 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block w-full py-2 align-middle md:w-1/2 sm:px-6 lg:px-8">
            <div id="categories-main-action-button" class="flex justify-end w-full mb-4">
                <a href="{{ route('admin.categories.new') }}">
                    <x-button.primary x-cloak class="group">
                        New Category
                        <x-heroicon-o-chevron-right class="h-4 ml-2 text-white group-hover:hidden"></x-heroicon-chevron-right>
                        <x-heroicon-o-arrow-right class="hidden h-4 ml-2 text-white group-hover:inline-block"></x-heroicon-chevron-right>
                    </x-button.primary>
                </a>
            </div>
            <div class="mb-4 overflow-hidden border-b border-gray-200 shadow dark:border-gray-400 sm:rounded-lg">
                <table id="categories-table" class="w-full divide-y divide-gray-200 dark:divide-gray-400">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">
                                Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">
                                Color
                            </th>
                            <th scope="col" colspan="2" class="relative px-6 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-400">
                        @forelse($categories as $category)
                        <tr id="category_{{ $category->id }}">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-gray-300 whitespace-nowrap">
                                {{ $category->name }}
                            </td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-gray-300 whitespace-nowrap">
                                <span class="bg-{{ $category->color }} py-[.35rem] px-4 rounded-full leading-3 uppercase text-[length:.63rem] font-bold font-coda text-white">
                                    {{ $category->color }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.categories.edit', $category->slug) }}" class="w-full">
                                    <span class="text-sm font-medium text-indigo-600 dark:text-indigo-300 whitespace-nowrap">Edit</span>
                                </a>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <x-confirms-action wire:then="deleteCategory()" title="Delete Category" confirmable="{{ $category->uuid }}"
                                    content="Are you sure you want to delete this category?" button="Delete">
                                    <x-heroicon-o-trash wire:loading.attr="disabled" class="w-5 text-red-500 cursor-pointer hover:text-red-300" />
                                </x-confirms-action>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                No Categories Found
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
