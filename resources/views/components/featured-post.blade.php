@props(['post'])

<section class="col-span-6 mb-4 overflow-visible font-sans rounded-lg group-link-underline lg:grid lg:grid-cols-4 lg:gap-2">
    <!-- Post Image -->
    <div class="flex items-center justify-center col-span-2 p-4 mb-4 border rounded-lg border-slate-300 dark:border-slate-700 bg-checkered-light dark:bg-checkered-dark">
        <img src="{{ $post->primary_image }}" class="object-cover object-center aspect-video lg:aspect-[4/3] rounded-lg" />
    </div>
    <!-- Post Categories and timestamp -->
    <div class="flex flex-col col-span-2 pl-0 mb-4 lg:mb-0 md:pl-4">
        <x-categories :categories="$post->categories" />
        <p class="mt-4 mb-2 font-mono text-xs text-slate-500 dark:text-slate-400">
            Published {{ $post->published_at->diffForHumans() }}
        </p>
        <div x-data class="self-start mb-2">
            <a x-on:click="$store.teamkimberlyn.setSeenToNewest()" href="@route('posts.show', $post->slug)" class="inline-block">
                <span class="text-2xl font-bold text-slate-800 dark:text-white md:text-4xl link link-underline title-font">{{ $post->title }}</span>
            </a>
        </div>
        <p class="mb-4 text-lg font-semibold leading-relaxed text-slate-600 dark:text-slate-300">{{ $post->summary }}</p>
        <a x-on:click="$store.teamkimberlyn.setSeenToNewest()" href="@route('posts.show', $post->slug)" class="inline-flex items-center self-end group">
            <x-heroicon-o-newspaper class="inline-block w-5 mr-2 text-slate-600 group-hover:hidden dark:text-slate-400" />
            <x-heroicon-o-book-open class="hidden w-5 mr-2 text-slate-600 group-hover:inline-block dark:text-slate-400" />
            <span class="font-mono text-slate-500 dark:text-slate-300 hover:text-slate-600 dark:hover:text-slate-400">Read More</span>
        </a>
    </div>
</section>
