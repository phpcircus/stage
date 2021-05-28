<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex flex-col">
            <span class="mb-4 text-sm italic text-gray-600">Published {{ $post->published_at->format('m/d/Y') }}</span>
            <h1 class="mb-4 text-3xl font-bold leading-tight text-gray-700 lg:mb-8 sm:text-6xl dark:text-gray-200 font-protogrotesk">
                {{ $post->title }}
            </h1>
            <div class="w-3/4 py-4 mx-auto">
                <img src="{{ $post->primary_image }}" class="object-cover w-full rounded-md shadow-md" />
            </div>
            <p class="trix-content">{!! $post->body !!}</p>
        </div>
    </div>
</div>
