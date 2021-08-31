<div x-data id="posts-table" class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div id="posts-main-action-button" class="flex justify-start w-full mb-4 lg:justify-end">
                <a href="@route('admin.posts.new')">
                    <x-button.primary>
                        New Post
                    </x-button.primary>
                </a>
            </div>
            <div class="overflow-hidden">
                <ul>
                    @forelse($posts as $post)
                    <li
                        class="relative px-4 pt-5 pb-8 mb-4 border-b border-gray-400 dark:border-gray-600">
                        <div class="flex justify-between space-x-3">
                            <div class="flex-1 min-w-0">
                                <div class="flex flex-col space-y-2 group-link-underline">
                                    <div>
                                        <a href="@route('admin.posts.edit', $post->slug)"
                                        class="text-lg font-semibold truncate text-skin-loud link-underline">
                                            {{ $post->title }}
                                        </a>
                                    </div>
                                    <time datetime="2021-01-27T16:35"
                                        class="flex-shrink-0 font-mono text-xs text-skin-muted whitespace-nowrap">
                                        {{ $post->published_at ? $post->published_at->format('m/d/Y') : '' }}
                                    </time>
                                </div>
                            </div>
                            <div class="ml-auto">
                                <x-confirms-action wire:then="deletePost()" title="Delete Post" confirmable="{{ $post->uuid }}"
                                    content="Are you sure you want to delete this post?" button="Delete">
                                    <x-heroicon-o-trash wire:loading.attr="disabled" class="w-5 text-red-500 cursor-pointer hover:text-red-300" />
                                </x-confirms-action>
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
                        <p class="text-sm font-medium truncate text-skin-loug">No Posts Found</p>
                    </li>
                    @endforelse
                </ul>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
