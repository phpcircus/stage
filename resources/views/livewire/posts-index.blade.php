<ul class="font-sans divide-y divide-gray-200">
    @foreach($posts as $post)
        <li>
            <a href="{{ route('posts.show', $post->slug) }}" class="block">
                <div class="pt-2 mb-4">
                    <div class="flex flex-col items-start justify-between mb-4 md:mb-0 md:items-center md:flex-row">
                        <p class="text-2xl font-medium text-gray-800 truncate">
                            {{ $post->title }}
                        </p>
                    </div>
                    <div class="flex flex-col items-center justify-between md:flex-row">
                        <div class="flex flex-col justify-between w-full mt-2 md:flex-row">
                            <p class="w-4/5 mb-4 text-lg text-gray-500 whitespace-normal md:mb-0">
                                {{ $post->summary }}
                            </p>
                            <p class="text-sm text-gray-500">Published on <time>{{ $post->published_at->diffForHumans() }}</time></p>
                        </div>
                    </div>
                </div>
            </a>
        </li>
    @endforeach
    {{ $posts->links() }}
</ul>
