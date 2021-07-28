<div x-data id="posts-table" class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div id="posts-main-action-button" class="flex justify-start w-full mb-4 lg:justify-end">
                <a href="{{ route('admin.posts.new') }}">
                    <x-button.primary x-cloak class="!py-[.6rem] !text-white !bg-indigo-500 !ring hover:!ring-offset-2 ring-indigo-600 dark:!ring-indigo-400">
                        New Post
                        <x-heroicon-o-chevron-right class="h-4 ml-2 text-white group-hover:hidden"></x-heroicon-chevron-right>
                        <x-heroicon-o-arrow-right class="hidden h-4 ml-2 text-white group-hover:inline-block"></x-heroicon-chevron-right>
                    </x-button.primary>
                </a>
            </div>
            <div class="overflow-hidden">
                <ul>
                    @forelse($posts as $post)
                        <li class="relative px-4 py-5 mb-4 border-t border-gray-300 rounded-lg dark:border-gray-600 bg-skin-fill-mantle">
                            <div class="flex justify-between space-x-3">
                                <div class="flex-1 min-w-0">
                                    <div>
                                        <p class="text-sm font-medium truncate text-skin-loud">
                                            <a href="{{ route('admin.posts.edit', $post->slug) }}">
                                                {{ $post->title }}
                                            </a>
                                        </p>
                                        <time datetime="2021-01-27T16:35" class="flex-shrink-0 text-sm text-skin-muted whitespace-nowrap">
                                            {{ $post->published_at ? $post->published_at->format('m/d/Y') : '' }}
                                        </time>
                                    </div>
                                </div>
                                <div class="ml-auto">
                                    <x-heroicon-o-trash wire:click="showDeleteConfirmation('{{ $post->uuid }}')" class="w-5 text-red-500 cursor-pointer" />
                                </div>
                            </div>
                            <div class="mt-1">
                                <p class="text-sm text-skin-base line-clamp-2">
                                    {{ $post->summary }}
                                </p>
                            </div>
                        </li>
                    </a>
                    @empty
                        <li class="relative px-4 py-5 rounded-lg bg-skin-fill-mantle">
                            <p class="text-sm font-medium truncate text-skin-loud">No Posts Found</p>
                        </li>
                    @endforelse
                </ul>
                {{ $posts->links() }}
            </div>
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
            <x-button.primary wire:click="deletePost()" type="button"
                class="group !px-4 !py-2 mr-8 dark:!ring-2 hover:!bg-indigo-600 hover:text-white hover:!ring hover:!ring-offset-2 hover:!ring-indigo-200/50">
                {{ __('Delete') }}
                <x-heroicon-o-chevron-right class="h-4 ml-2 text-gray-800 dark:text-white group-hover:text-white group-hover:hidden"></x-heroicon-chevron-right>
                <x-heroicon-o-arrow-right class="hidden h-4 ml-2 text-gray-800 dark:text-white group-hover:text-white group-hover:inline-block"></x-heroicon-chevron-right>
            </x-button.primary>
            <x-button.link wire:click="cancelModal()">
                Cancel
            </x-button.link>
        </x-slot>
    </x-jet-dialog-modal>
</div>
