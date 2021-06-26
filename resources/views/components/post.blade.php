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

<section class="{{ $columnSpan }} p-8 overflow-hidden font-sans rounded-lg mb-2 bg-gray-100 dark:bg-gray-800">
    <div class="flex flex-col items-start w-full">
        <div class="flex items-center justify-center w-full mb-4 rounded-lg">
            <img src="{{ $post->primary_image }}" class="object-cover w-auto h-auto rounded-lg shadow-md max-h-80" />
        </div>
        <div class="flex flex-wrap mb-2 space-x-2">
            @foreach($post->categories as $category)
                <div class="flex items-center mb-2">
                    <a href="{{ route('posts', [ 'category' => $category->name ]) }}">
                        <span class="inline-block text-xs ws:text-sm font-coda leading-4 text-skin-quiet border-b-2 border-transparent
                            hover:text-red-500 dark:hover:text-red-400/[.75]">
                            {{ $category->name }}
                        </span>
                    </a>
                    @if(! $loop->last)
                        <span class="text-red-400 dark:text-red-400/[.75] ml-2">/</span>
                    @endif
                </div>
            @endforeach
        </div>
        <p class="text-xs italic text-gray-500">Published {{ $post->published_at->diffForHumans() }}</p>
        <div class="my-2">
            <a href="{{ route('posts.show', $post->slug) }}"
                class="inline-block text-2xl font-bold text-skin-loud hover:underline title-font ">
                {{ $post->title }}
            </a>
        </div>
        <p class="mb-4 leading-relaxed text-skin-base">{{ $post->summary }}</p>
        <div class="flex flex-wrap items-center self-end w-full pb-4 mt-auto">
            <a href="{{ route('posts.show', $post->slug) }}"
                class="inline-flex items-center ml-auto text-skin-base hover:underline">Read More
            </a>
        </div>
    </div>
</section>