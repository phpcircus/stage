<div id="categories-table" class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block w-full py-2 align-middle md:w-1/2 sm:px-6 lg:px-8">
            <div id="categories-main-action-button" class="flex justify-end w-full mb-4">
                <a href="{{ route('admin.categories.new') }}">
                    <x-button.primary class="ml-auto">
                        New Category
                    </x-button.primary>
                </a>
            </div>
            <div class="mb-4 overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                <table id="categories-table" class="w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Name
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($categories as $category)
                        <tr id="category_{{ $category->id }}">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                {{ $category->name }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.categories.edit', $category->slug) }}" class="w-full">
                                    <span class="text-sm font-medium text-indigo-600 whitespace-nowrap">Edit</span>
                                </a>
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
