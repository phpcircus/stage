<div x-data="{}" x-init="
    document.querySelectorAll('pre').forEach((block) => {
        hljs.highlightBlock(block);
    });
" class="py-12">
    <div class="px-6 mx-auto max-w-7xl lg:px-8">
        <div class="flex flex-col">
            <span class="mb-4 text-sm italic text-gray-600">Published {{ $post->published_at->format('m/d/Y') }}</span>
            <h1 class="mb-4 text-3xl font-bold leading-tight text-gray-700 lg:mb-8 sm:text-6xl dark:text-gray-200 font-protogrotesk">
                {{ $post->title }}
            </h1>
            <div class="flex justify-center w-full py-4 mx-auto mb-4">
                <img alt="primary_post_image" src="{{ $post->primary_image }}" class="object-cover h-auto rounded-md shadow-md max-h-96">
            </div>
            <div class="trix-content">{!! $post->body !!}</div>
        </div>
    </div>
</div>
