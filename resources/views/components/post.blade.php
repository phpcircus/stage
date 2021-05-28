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

<section class="{{ $columnSpan }} p-8 overflow-hidden font-sans text-gray-600 shadow bg-white/25">
    <div class="flex flex-col items-start w-full">
        <div class="flex items-center justify-center mb-2 bg-blue-100 rounded-lg">
            <img src="{{ $post->primary_image }}" class="object-cover w-full h-auto rounded-lg shadow-md" />
        </div>
        <div class="mb-2">
            @foreach($post->categories as $category)
                <span
                    class="inline-block py-0.5 px-2 mr-1 rounded bg-white text-gray-600 border border-gray-600 text-xs font-medium tracking-widest tag-wordpress">
                    {{ $category->name }}
                </span>
            @endforeach
        </div>
        <p class="text-xs italic text-gray-500">Published {{ $post->published_at->diffForHumans() }}</p>
        <h2 class="my-2 text-2xl font-medium text-gray-900 title-font"><a
                href="{{ route('posts.show', $post->slug) }}"
                class="inline-block hover:underline">{{ $post->title }}</a>
        </h2>
        <p class="mb-4 leading-relaxed">{{ $post->summary }}</p>
        <div class="flex flex-wrap items-center self-end w-full pb-4 mt-auto">
            <a href="{{ route('posts.show', $post->slug) }}"
                class="inline-flex items-center ml-auto text-gray-900 hover:underline">Read More
            </a>
        </div>
    </div>
</section>