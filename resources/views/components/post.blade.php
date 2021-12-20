@props(['post'])

<div class="flex flex-col items-start w-full mb-4">
    <div class="flex items-center justify-center w-full p-4 mb-4 border rounded-lg border-slate-300 dark:border-slate-700 bg-checkered-light dark:bg-checkered-dark">
        <img src="{{ $post->primary_image }}"
            class="object-cover object-top rounded-lg aspect-video" />
    </div>
    <x-categories :categories="$post->categories" />
    <p class="mt-4 font-mono text-xs text-slate-500 dark:text-slate-400">
        Published {{ $post->published_at->diffForHumans() }}
    </p>
    <div class="my-2">
        <a href="@route('posts.show', $post->slug)" class="inline-block">
            <span class="text-2xl font-bold text-slate-800 dark:text-white link link-underline title-font">{{ $post->title }}</span>
        </a>
    </div>
    <p class="mb-4 text-lg font-semibold leading-relaxed text-slate-600 dark:text-slate-300 line-clamp-4">{{ $post->summary }}</p>
    <div class="flex items-center justify-end w-full pb-2 mt-auto">
        <a x-on:click="$store.teamkimberlyn.setSeenToNewest()" href="@route('posts.show', $post->slug)" class="inline-flex items-center self-end group">
            <x-heroicon-o-newspaper class="inline-block w-5 mr-2 text-slate-600 group-hover:hidden dark:text-slate-400" />
            <x-heroicon-o-book-open class="hidden w-5 mr-2 text-slate-600 group-hover:inline-block dark:text-slate-400" />
            <span class="font-mono text-slate-500 dark:text-slate-300 hover:text-slate-600 dark:hover:text-slate-400">Read More</span>
        </a>
    </div>
</div>
