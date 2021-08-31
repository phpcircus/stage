@props(['post'])

<section
    class="col-span-6 mb-4 overflow-visible font-sans rounded-lg group-link-underline lg:grid lg:grid-cols-4 lg:gap-2">
    <!-- Post Image -->
    <div class="flex items-center justify-center col-span-2 mb-4 rounded-lg shadow-all-around dark:shadow-all-around-light aspect-w-16 aspect-h-9 lg:aspect-w-4 lg:aspect-h-3">
        <img src="{{ $post->primary_image }}"
            class="object-cover object-center w-full h-full rounded-lg" />
    </div>
    <!-- Post Categories and timestamp -->
    <div class="flex flex-col col-span-2 pl-0 mb-4 lg:mb-0 md:pl-4">
        <x-categories :categories="$post->categories" />
        <p class="mt-4 mb-2 font-mono text-xs text-gray-500">Published
            {{ $post->published_at->diffForHumans() }}</p>
        <div x-data class="self-start mb-2">
            <a x-on:click="$store.teamkimberlyn.setSeenToNewest()" href="@route('posts.show', $post->slug)"
                class="inline-block">
                <span
                    class="text-2xl font-bold text-skin-loud md:text-4xl link link-underline title-font">{{ $post->title }}</span>
            </a>
        </div>
        <p class="mb-4 text-lg font-semibold leading-relaxed text-skin-base">{{ $post->summary }}</p>
        <a x-on:click="$store.teamkimberlyn.setSeenToNewest()" href="@route('posts.show', $post->slug)"
            class="inline-flex items-center self-end group">
            <x-heroicon-o-newspaper class="inline-block w-5 mr-2 text-gray-600 group-hover:hidden" />
            <x-heroicon-o-book-open class="hidden w-5 mr-2 text-gray-500 group-hover:inline-block" />
            <span class="font-mono text-gray-600 dark:text-gray-400 hover:text-gray-500 dark:hover:text-gray-500">Read More</span>
        </a>
    </div>
</section>
