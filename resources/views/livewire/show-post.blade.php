<div x-data="highlight" class="px-4 py-12 sm:px-8">
    <div class="p-6 mx-auto rounded-lg shadow-md max-w-7xl lg:p-8 bg-skin-fill-mantle">
        <div class="flex flex-col">
            <span class="mb-6 text-sm italic text-skin-quiet">
                Published {{ $post->published_at->format('m/d/Y') }}
            </span>
            <h1 class="mb-2 text-3xl font-bold leading-tight lg:mb-4 sm:text-6xl font-protogrotesk text-skin-loud">
                {{ $post->title }}
            </h1>
            <x-categories :categories="$post->categories" />
            <div class="flex justify-center w-full py-4 mx-auto mb-4">
                <img alt="primary_post_image" src="{{ $post->primary_image }}"
                    class="object-cover h-auto rounded-md shadow-md ring-2 ring-gray-200/50 ring-offset-2 ring-offset-gray-50 dark:ring-offset-gray-800 max-h-96">
            </div>
            <div class="!leading-relaxed trix-content text-skin-base">
                {!! $post->body !!}
            </div>
        </div>
    </div>
    @section('seo')
        <meta property="twitter:card" content="summary_large_image">
        <meta property="og:title" content="{{ $post->title }}">
        <meta property="og:type" content="article">
        <meta property="og:url" content="https://phpstage.com/posts/{{ $post->slug }}">
        <meta property="og:description" content="{{ $post->summary }}">
        <meta property="og:image" content="{{ URL::asset($post->primary_image) }}">
    @endsection

    @push('scripts')
        <script>
            document.addEventListener('alpine:initializing', function() {
                Alpine.data('highlight', () => ({
                    init() {
                        document.querySelectorAll('pre').forEach((el) => {
                            this.$nextTick(() => {
                                hljs.highlightElement(el);
                            });
                        });
                    }
                }));
            });
        </script>
    @endpush
</div>
