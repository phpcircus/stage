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

<div x-data="{ shown: false }" x-intersect.once="shown = true" class="{{ $columnSpan }} p-4 mb-2 group-link-underline overflow-hidden font-sans rounded-lg shadow-md xs:p-8 bg-skin-fill-mantle">
    <section x-show="shown" x-transition x-transition.duration.1000ms>
        <div class="flex flex-col items-start w-full">
            <div class="flex items-center justify-center w-full mb-4 rounded-lg">
                <img src="{{ $post->primary_image }}" class="object-cover object-center w-full h-auto rounded-lg shadow-md ws:object-top xl:object-center ring-2 ring-gray-200/50 ring-offset-2 ring-offset-gray-50 dark:ring-offset-gray-800 max-h-80" />
            </div>
            <x-categories :categories="$post->categories" />
            <p class="text-xs italic text-gray-500">Published {{ $post->published_at->diffForHumans() }}</p>
            <div class="my-2">
                <a href="{{ route('posts.show', $post->slug) }}"
                    class="inline-block">
                    <span class="text-2xl font-bold link link-underline text-skin-loud title-font">{{ $post->title }}</span>
                </a>
            </div>
            <p class="mb-4 leading-relaxed text-skin-base line-clamp-4">{{ $post->summary }}</p>
            <div class="flex flex-wrap items-center self-end w-full pb-4 mt-auto">
                <a href="{{ route('posts.show', $post->slug) }}"
                    class="inline-flex items-center ml-auto text-skin-base hover:underline">Read More
                </a>
            </div>
        </div>
    </section>
</div>
