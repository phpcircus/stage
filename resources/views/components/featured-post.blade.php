@props([
    'post',
])

<section class="col-span-6 p-4 mb-2 overflow-hidden font-sans rounded-lg shadow-md xs:p-8 lg:p-8 lg:grid lg:grid-cols-3 lg:gap-4 bg-skin-fill-mantle">
    <!-- Post Image -->
    <div class="flex items-center justify-center w-full mb-4 rounded-lg shadow-md">
        <img src="{{ $post->primary_image }}" class="object-cover object-center w-full rounded-lg ws:object-top xl:object-center h-96 ring-2 ring-gray-200/50 ring-offset-2 ring-offset-gray-50 dark:ring-offset-gray-800" />
    </div>
    <!-- Post Categories and timestamp -->
    <div class="flex flex-col col-span-2">
        <div class="flex flex-wrap mb-2">
            @foreach($post->categories as $category)
                <div x-data class="flex items-center mb-2 {{ $loop->first ? '' : 'ml-2' }}">
                    <a href="{{ route('posts', [ 'category' => $category->name ]) }}">
                        <span class="border border-transparent py-[.35rem] px-4 bg-{{ $category->color }} rounded-full leading-3 uppercase inline-block text-[length:.63rem] font-bold font-coda text-white
                            hover:bg-transparent hover:border-{{$category->color }} hover:text-{{$category->color }}">
                            {{ $category->name }}
                        </span>
                    </a>
                </div>
            @endforeach
        </div>
        <p class="mb-4 text-xs italic text-gray-500">Published {{ $post->published_at->diffForHumans() }}</p>
        <div x-data class="self-start my-2">
            <a x-on:click="$store.stage.setSeenToNewest()" href="{{ route('posts.show', $post->slug) }}"
                class="inline-block text-2xl font-bold text-skin-loud hover:underline title-font">
                {{ $post->title }}
            </a>
        </div>
        <p class="mb-4 leading-relaxed text-skin-base">{{ $post->summary }}</p>
        <a x-on:click="$store.stage.setSeenToNewest()" href="{{ route('posts.show', $post->slug) }}"
            class="inline-flex items-center self-end text-skin-base hover:underline">Read More
        </a>
    </div>
</section>