@props([
    'post',
])

<section class="col-span-6 p-4 mb-2 overflow-hidden font-sans rounded-lg shadow-md lg:p-8 lg:grid lg:grid-cols-3 lg:gap-4 bg-skin-fill-mantle">
    <!-- Post Image -->
    <div class="flex items-center justify-center col-span-1 mb-4 overflow-hidden bg-blue-100 rounded-lg lg:mb-0 max-h-96">
        <img src="{{ $post->primary_image }}" class="object-cover object-center w-full rounded-lg shadow-md ws:object-top xl:object-center h-96" />
    </div>
    <!-- Post Categories and timestamp -->
    <div class="flex flex-col col-span-2">
        <div class="flex flex-wrap mb-2 space-x-2">
            @foreach($post->categories as $category)
                <div class="flex items-center mb-2">
                    <a href="{{ route('posts', [ 'category' => $category->name ]) }}">
                        <span class="py-[.35rem] px-4 bg-{{ $category->color }} rounded-full leading-3 uppercase inline-block text-[length:.63rem] font-bold font-coda text-white">
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
    <script>
        var backgroundColors = [
            'bg-gray-400',
            'bg-gray-500',
            'bg-gray-600',
            'bg-gray-700',
            'bg-gray-800',
            'bg-gray-900',
            'bg-red-400',
            'bg-red-500',
            'bg-red-600',
            'bg-red-700',
            'bg-red-800',
            'bg-red-900',
            'bg-yellow-400',
            'bg-yellow-500',
            'bg-yellow-600',
            'bg-yellow-700',
            'bg-yellow-800',
            'bg-yellow-900',
            'bg-green-400',
            'bg-green-500',
            'bg-green-600',
            'bg-green-700',
            'bg-green-800',
            'bg-green-900',
            'bg-blue-400',
            'bg-blue-500',
            'bg-blue-600',
            'bg-blue-700',
            'bg-blue-800',
            'bg-blue-900',
            'bg-indigo-400',
            'bg-indigo-500',
            'bg-indigo-600',
            'bg-indigo-700',
            'bg-indigo-800',
            'bg-indigo-900',
            'bg-purple-400',
            'bg-purple-500',
            'bg-purple-600',
            'bg-purple-700',
            'bg-purple-800',
            'bg-purple-900',
            'bg-pink-400',
            'bg-pink-500',
            'bg-pink-600',
            'bg-pink-700',
            'bg-pink-800',
            'bg-pink-900',
        ];
    </script>
</section>