@props([
    'post',
    'loop'
])
@if($loop->iteration  == 1)
    <section class="col-span-6 p-8 overflow-hidden font-sans text-gray-600 lg:grid lg:grid-cols-3 bg-white/25">
        <!-- Post Image -->
        <div class="w-full col-span-1">
            <img src="{{ $post->primary_image }}" />
        </div>
        <!-- Post Categories and timestamp -->
        <div class="flex flex-col justify-between">
            <div class="flex flex-col space-y-2">
                @foreach($post->categories as $category)
                    <span
                        class="w-1/4 inline-block py-0.5 px-2 mr-1 rounded bg-white text-gray-600 border border-gray-600 text-xs font-medium tracking-widest tag-wordpress">
                        {{ $category->name }}
                    </span>
                @endforeach
            </div>
            <p class="text-xs italic text-gray-500">Published {{ $post->published_at->diffForHumans() }}</p>
        </div>
        </div>
        <h2 class="my-2 text-2xl font-medium text-gray-900 title-font"><a
                href="/posts/{{ $post->slug }}"
                class="inline-block hover:underline">{{ $post->title }}</a>
        </h2>
        <p class="mb-4 leading-relaxed">{{ $post->summary }}</p>
        <div class="flex flex-wrap items-center w-full pb-4 mt-auto">
            <a href="/posts/{{ $post->slug }}"
                class="inline-flex items-center text-gray-900 hover:underline">Read More
            </a>
        </div>
    </section>
@else
    <section class="{{ $loop->iteration > 3 ? 'col-span-2' : 'col-span-3' }} p-8 overflow-hidden font-sans text-gray-600 bg-white/25">
        <div class="flex flex-col items-start w-full">
            <div class="mb-2">
                @foreach($post->categories as $category)
                    <span
                        class="inline-block py-0.5 px-2 mr-1 rounded bg-white text-gray-600 border border-gray-600 text-xs font-medium tracking-widest tag-wordpress">
                        {{ $category->name }}
                    </span>
                @endforeach
            </div>
            <div class="w-full">
                <img src="{{ $post->primary_image }}" />
            </div>
            <p class="mt-2 text-xs italic text-gray-500">Published {{ $post->published_at->diffForHumans() }}</p>
            <h2 class="my-2 text-2xl font-medium text-gray-900 title-font"><a
                    href="/posts/{{ $post->slug }}"
                    class="inline-block hover:underline">{{ $post->title }}</a>
            </h2>
            <p class="mb-4 leading-relaxed">{{ $post->summary }}</p>
            <div class="flex flex-wrap items-center w-full pb-4 mt-auto">
                <a href="/posts/{{ $post->slug }}"
                    class="inline-flex items-center text-gray-900 hover:underline">Read More
                </a>
            </div>
        </div>
    </section>
@endif