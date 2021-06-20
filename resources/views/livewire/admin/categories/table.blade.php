<div id="categories-table" class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block w-full py-2 align-middle md:w-1/2 sm:px-6 lg:px-8">
            <div id="categories-main-action-button" class="flex justify-end w-full mb-4">
                <a href="{{ route('admin.categories.new') }}">
                    <x-button.primary x-cloak class="ml-auto font-semibold dark:border-transparent dark:bg-gray-300 dark:text-indigo-600 dark:hover:text-gray-300 dark:hover:bg-indigo-600">
                        New Category
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
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.categories.edit', $category->slug) }}" class="w-full">
                                    <span class="text-sm font-medium text-indigo-600 dark:text-indigo-300 whitespace-nowrap">Edit</span>
                                </a>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <x-heroicon-o-trash wire:click="showDeleteConfirmation('{{ $category->uuid }}')" class="w-5 text-red-500 cursor-pointer" />
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

    <x-jet-dialog-modal wire:model="showDeleteConfirmation" component="admin.categories.table">
        <x-slot name="title">
            Delete Category
        </x-slot>
        <x-slot name="content">
            Are you sure you want to delete this category?
        </x-slot>
        <x-slot name="footer">
            <x-button.primary wire:click="deleteCategory()">
                Delete Category
            </x-button.primary>
            <x-button.secondary wire:click="cancelModal()">
                Cancel
            </x-button.secondary>
        </x-slot>
    </x-jet-dialog-modal>
</div>
