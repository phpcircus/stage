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

<div x-data="{ shown: false }" x-intersect.once="shown = true" class="{{ $columnSpan }} p-4 mb-2 overflow-hidden font-sans rounded-lg shadow-md xs:p-8 bg-skin-fill-mantle">
    <section x-show="shown" x-transition x-transition.duration.1000ms>
        <div class="flex flex-col items-start w-full">
            <div class="flex items-center justify-center w-full mb-4 rounded-lg">
                <img src="{{ $post->primary_image }}" class="object-cover w-auto h-auto rounded-lg shadow-md ring-2 ring-gray-200/50 ring-offset-2 ring-offset-gray-50 dark:ring-offset-gray-800 max-h-80" />
            </div>
            <div class="flex flex-wrap mb-2 -mx-2">
                @foreach($post->categories as $category)
                    <div class="flex items-center mx-2 mb-2">
                        <a href="{{ route('posts', [ 'category' => $category->name ]) }}">
                            <span class="border border-transparent py-[.35rem] px-4 bg-{{ $category->color }} rounded-full leading-3 uppercase inline-block text-[length:.63rem] font-bold font-coda text-white
                                hover:bg-transparent hover:border-{{$category->color }} hover:text-{{$category->color }}">
                                {{ $category->name }}
                            </span>
                        </a>
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
</div>