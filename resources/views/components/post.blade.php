@props(['post'])

<div class="flex flex-col items-start w-full mb-4">
    <div class="flex items-center justify-center w-full mb-4 rounded-lg aspect-w-16 aspect-h-9 shadow-all-around dark:shadow-all-around-light">
        <img src="{{ $post->primary_image }}"
            class="object-cover object-center w-full h-full rounded-lg" />
    </div>
    <x-categories :categories="$post->categories" />
    <p class="mt-4 font-mono text-xs text-gray-500">Published
        {{ $post->published_at->diffForHumans() }}</p>
    <div class="my-2">
        <a href="@route('posts.show', $post->slug)" class="inline-block">
            <span class="text-2xl font-bold link link-underline text-skin-loud title-font">{{ $post->title }}</span>
        </a>
    </div>
    <p class="mb-4 text-lg font-semibold leading-relaxed text-skin-base line-clamp-4">{{ $post->summary }}</p>
    <div class="flex items-center justify-end w-full pb-2 mt-auto">
        <a x-on:click="$store.teamkimberlyn.setSeenToNewest()" href="@route('posts.show', $post->slug)"
            class="inline-flex items-center self-end group">
            <x-heroicon-o-newspaper class="inline-block w-5 mr-2 text-gray-500 group-hover:hidden dark:text-gray-500" />
            <x-heroicon-o-book-open class="hidden w-5 mr-2 text-gray-500 group-hover:inline-block dark:text-gray-500" />
            <span class="font-mono text-gray-600 dark:text-gray-400 hover:text-gray-500 dark:hover:text-gray-500">Read More</span>
        </a>
    </div>
</div>
