<div class="w-full">
    <div class="grid grid-cols-6 gap-4 pb-12 md:gap-8">
        @if ($featured && ($page === 1 || $page === null))
            <x-featured-post :post="$featured"></x-featured-post>
        @endif

        @forelse ($posts as $post)
            <div x-data="{ shown: false }" x-intersect.once="shown = true"
                class="col-span-6 {{ $loop->iteration <= 2 && ($page === 1 || $page === null) ? 'lg:col-span-3' : 'lg:col-span-2' }} mb-2 group-link-underline overflow-visible font-sans rounded-lg">
                <section x-show="shown" x-transition x-transition.duration.1000ms>
                    <x-post :post="$post"></x-post>
                </section>
            </div>
        @empty
            <div class="col-span-6 mb-2 overflow-visible font-sans rounded-lg group-link-underline">
                <section x-show="shown" x-transition x-transition.duration.1000ms>
                    No posts found.
                </section>
            </div>
        @endforelse

        @if (!$featured && $posts->count() < 1)
            <h1 class="col-span-6 text-4xl text-slate-600 dark:text-slate-300 font-protogrotesk">No Posts Found. 🙁 Check
                back later.</h1>
        @endif
    </div>
    <div class="flex justify-end w-full">
        {{ $posts ? $posts->links() : '' }}
    </div>
</div>
