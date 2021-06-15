@props([
    'post',
])
<section class="col-span-6 p-8 overflow-hidden font-sans text-gray-600 shadow lg:grid lg:grid-cols-3 lg:gap-4 bg-white/25">
    <!-- Post Image -->
    <div class="flex items-center justify-center col-span-1 mb-2 bg-blue-100 rounded-lg lg:mb-0">
        <img src="{{ $post->primary_image }}" class="object-cover w-full h-auto rounded-lg shadow-md" />
    </div>
    <!-- Post Categories and timestamp -->
    <div class="flex flex-col col-span-2">
        <div class="flex mb-2 space-x-2">
            @foreach($post->categories as $category)
                <a href="{{ route('posts', [ 'category' => $category->name ]) }}" class="group">
                    <span
                        class="group-hover:bg-red-400 group-hover:text-white inline-block py-0.5 px-2 mr-1 rounded bg-white text-gray-600 border border-gray-600 text-xs font-medium tracking-widest tag-wordpress">
                        {{ $category->name }}
                    </span>
                </a>
            @endforeach
        </div>
        <p class="mb-4 text-xs italic text-gray-500">Published {{ $post->published_at->diffForHumans() }}</p>
        <div x-data="" class="self-start my-2">
            <a x-on:click="localStorage.setItem('seen', localStorage.getItem('newest'))" href="{{ route('posts.show', $post->slug) }}" class="inline-block text-2xl font-medium text-gray-900 hover:underline title-font">
                {{ $post->title }}
            </a>
        </div>
        <p class="mb-4 leading-relaxed">{{ $post->summary }}</p>
        <a href="{{ route('posts.show', $post->slug) }}"
            class="inline-flex items-center self-end text-gray-900 hover:underline">Read More
        </a>
    </div>
</section>