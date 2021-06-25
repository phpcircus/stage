<div x-data id="posts-table" class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div id="posts-main-action-button" class="flex justify-start w-full mb-4 lg:justify-end">
                <a href="{{ route('admin.posts.new') }}">
                    <x-button.primary x-cloak>
                        New Post
                    </x-button.primary>
                </a>
            </div>
            <div class="mb-4 overflow-hidden border-b border-gray-200 shadow dark:border-gray-400 sm:rounded-lg">
                <table id="posts-table" class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th scope="col"
                                class="w-1/2 px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase sm:w-1/3 dark:text-gray-300">
                                Title
                            </th>
                            <th scope="col"
                                class="hidden px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase sm:table-cell sm:w-1/3 dark:text-gray-300">
                                Published
                            </th>
                            <th scope="col" colspan="2" class="relative w-1/2 px-6 py-3 sm:w-1/3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-400">
                        @forelse($posts as $post)
                        <tr id="post_{{ $post->id }}">
                            <td class="w-1/2 px-6 py-4 text-sm text-gray-500 sm:w-1/3 dark:text-gray-300 whitespace-nowrap">{{ $post->title }}</td>
                            <td class="hidden px-6 py-4 text-sm text-gray-500 sm:table-cell sm:w-1/3 dark:text-gray-300 whitespace-nowrap">
                                {{ $post->published_at ? $post->published_at->format('m/d/Y') : '' }}
                            </td>
                            <td class="w-1/2 px-6 py-4 text-right sm:w-1/3">
                                <a href="{{ route('admin.posts.edit', $post->slug) }}" class="w-full">
                                    <span class="mr-2 text-sm font-medium text-indigo-600 dark:text-indigo-300 whitespace-nowrap">Edit</span>
                                </a>
                                <x-heroicon-o-trash wire:click="showDeleteConfirmation('{{ $post->uuid }}')" class="w-5 text-red-500 cursor-pointer" />
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                No Posts Found
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $posts->links() }}
        </div>
    </div>

    <x-jet-dialog-modal wire:model="showDeleteConfirmation" component="admin.posts.table">
        <x-slot name="title">
            Delete Post
        </x-slot>
        <x-slot name="content">
            Are you sure you want to delete this post?
        </x-slot>
        <x-slot name="footer">
            <x-button.primary wire:click="deletePost()">
                Delete Post
            </x-button.primary>
            <x-button.secondary wire:click="cancelModal()">
                Cancel
            </x-button.secondary>
        </x-slot>
    </x-jet-dialog-modal>
</div>
