<div id="posts-table" class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div id="posts-main-action-button" class="flex justify-end w-full mb-4">
                <x-button.primary class="ml-auto" x-data="" x-on:click="window.livewire.emitTo('admin.posts.form', 'show', 'App\\\Models\\\Post')">
                    New Post
                </x-button.primary>
            </div>
            <div class="mb-4 overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                <table id="posts-table" class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Date
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Title
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Published
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($posts as $post)
                        <tr id="post_{{ $post->id }}">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                {{ $post->created_at->format('m/d/Y h:i a') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ $post->title }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ $post->published_at->format('m/d/Y h:i a') }}
                            </td>
                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                <span x-data="" x-on:click.prevent="$wire.emitTo('admin.posts.form', 'show', 'App\\\Models\\\Post', {{$post->id}})" class="text-indigo-600 cursor-pointer hover:text-indigo-900">Edit</span>
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
</div>
