@props([
    'post',
])

<section class="col-span-6 p-8 mb-2 overflow-hidden font-sans text-gray-600 bg-gray-100 rounded-lg shadow lg:grid lg:grid-cols-3 lg:gap-4 dark:bg-gray-800 dark:text-gray-200">
    <!-- Post Image -->
    <div class="flex items-center justify-center col-span-1 mb-4 bg-blue-100 rounded-lg lg:mb-0">
        <img src="{{ $post->primary_image }}" class="object-cover w-full h-auto rounded-lg shadow-md" />
    </div>
    <!-- Post Categories and timestamp -->
    <div class="flex flex-col col-span-2">
        <div class="flex flex-wrap mb-2 space-x-3">
            @foreach($post->categories as $category)
                <a href="{{ route('posts', [ 'category' => $category->name ]) }}" class="group">
                    <span class="inline-block pb-1 pt-1.5 mb-2 text-xl font-medium
                        font-script leading-4 text-gray-700 hover:text-red-500 dark:text-gray-500 dark:hover:text-red-400/[.75]">
                        {{ $category->name }}
                    </span>
                </a>
            @endforeach
        </div>
        <p class="mb-4 text-xs italic text-gray-500">Published {{ $post->published_at->diffForHumans() }}</p>
        <div x-data class="self-start my-2">
            <a x-on:click="$store.stage.setSeenToNewest()" href="{{ route('posts.show', $post->slug) }}"
                class="inline-block text-2xl font-bold text-gray-800 hover:underline title-font dark:text-gray-300">
                {{ $post->title }}
            </a>
        </div>
        <p class="mb-4 leading-relaxed">{{ $post->summary }}</p>
        <a href="{{ route('posts.show', $post->slug) }}"
            class="inline-flex items-center self-end text-gray-900 dark:text-gray-400 hover:underline">Read More
        </a>
    </div>
</section>