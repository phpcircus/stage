@props([
    'post',
    'loop',
    'page',
])

@php
    $columnSpan = 'col-span-2';
    if($loop->iteration < 3 && ($page == 1 || $page == null)) {
        $columnSpan = 'col-span-3';
    }
@endphp

<section class="{{ $columnSpan }} p-8 overflow-hidden font-sans rounded-lg mb-2 bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-200">
    <div class="flex flex-col items-start w-full">
        <div class="flex items-center justify-center w-full mb-4 rounded-lg">
            <img src="{{ $post->primary_image }}" class="object-cover w-auto h-auto rounded-lg shadow-md max-h-80" />
        </div>
        <div class="flex flex-wrap mb-2 space-x-2">
            @foreach($post->categories as $category)
                <a href="{{ route('posts', [ 'category' => $category->name ]) }}" class="group">
                    <span
                        class="inline-block pb-1 pt-1.5 mb-2 text-xl font-medium
                        font-script leading-4 text-gray-700 hover:text-red-500 dark:text-gray-500 dark:hover:text-red-400/[.75]">
                        {{ $category->name }}
                    </span>
                </a>
            @endforeach
        </div>
        <p class="text-xs italic text-gray-500">Published {{ $post->published_at->diffForHumans() }}</p>
        <div class="my-2">
            <a href="{{ route('posts.show', $post->slug) }}"
                class="inline-block text-2xl font-bold text-gray-800 hover:underline title-font dark:text-gray-300">
                {{ $post->title }}
            </a>
        </div>
        <p class="mb-4 leading-relaxed">{{ $post->summary }}</p>
        <div class="flex flex-wrap items-center self-end w-full pb-4 mt-auto">
            <a href="{{ route('posts.show', $post->slug) }}"
                class="inline-flex items-center ml-auto text-gray-900 dark:text-gray-400 hover:underline">Read More
            </a>
        </div>
    </div>
</section>