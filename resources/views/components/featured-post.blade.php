@props(['post'])

<section
    class="col-span-6 p-4 mb-2 overflow-hidden font-sans rounded-lg group-link-underline xs:p-8 lg:p-8 lg:grid lg:grid-cols-3 lg:gap-4">
    <!-- Post Image -->
    <div class="flex items-center justify-center w-full mb-4 rounded-lg shadow-lg">
        <img src="{{ $post->primary_image }}"
            class="object-cover object-center w-full rounded-lg shadow-extreme md:shadow-lower-right ws:object-top xl:object-center h-96" />
    </div>
    <!-- Post Categories and timestamp -->
    <div class="flex flex-col col-span-2 pl-0 mb-4 lg:mb-0 md:pl-4">
        <x-categories :categories="$post->categories" />
        <p class="mt-4 mb-2 font-mono text-xs text-gray-500">Published
            {{ $post->published_at->diffForHumans() }}</p>
        <div x-data class="self-start mb-2">
            <a x-on:click="$store.stage.setSeenToNewest()" href="{{ route('posts.show', $post->slug) }}"
                class="inline-block">
                <span
                    class="text-2xl font-bold md:text-4xl link link-underline text-skin-loud title-font">{{ $post->title }}</span>
            </a>
        </div>
        <p class="mb-4 text-lg font-semibold leading-relaxed text-skin-base">{{ $post->summary }}</p>
        <a x-on:click="$store.stage.setSeenToNewest()" href="{{ route('posts.show', $post->slug) }}"
            class="inline-flex items-center self-end font-mono text-skin-base hover:underline">Read More
        </a>
    </div>
</section>
