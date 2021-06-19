<div id="posts-table" class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div id="posts-main-action-button" class="flex justify-end w-full mb-4">
                <a href="{{ route('admin.posts.new') }}">
                    <x-button.primary class="ml-auto">
                        New Post
                    </x-button.primary>
                </a>
            </div>
            <div class="mb-4 overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                <table id="posts-table" class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Title
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Published
                            </th>
                            <th scope="col" colspan="2" class="relative px-6 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($posts as $post)
                        <tr id="post_{{ $post->id }}">
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ $post->title }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ $post->published_at ? $post->published_at->format('m/d/Y') : '' }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.posts.edit', $post->slug) }}" class="w-full">
                                    <span class="text-sm font-medium text-indigo-600 whitespace-nowrap">Edit</span>
                                </a>
                            </td>
                            <td class="px-6 py-4 text-right">
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
