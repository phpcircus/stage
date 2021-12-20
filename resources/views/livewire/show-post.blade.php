<div x-data="highlight" class="px-4 py-12 mx-auto sm:px-6 lg:px-8 max-w-7xl">
    <div class="pb-6 mx-auto -mt-8 md:mt-0 max-w-7xl lg:pb-8">
        <div class="flex flex-col">
            <span class="mb-6 text-sm italic text-slate-500 dark:text-slate-400">
                Published {{ $post->published_at->format('m/d/Y') }}
            </span>
            <h1 class="mb-2 text-3xl font-bold leading-tight lg:mb-4 sm:text-6xl font-protogrotesk text-slate-800 dark:text-white">
                {{ $post->title }}
            </h1>
            <x-categories :categories="$post->categories" />
            <div class="flex items-center justify-center p-4 my-4 border rounded-lg border-slate-300 dark:border-slate-700 bg-checkered-light dark:bg-checkered-dark">
                <img alt="primary_post_image" src="{{ $post->primary_image }}" class="object-cover object-center rounded-lg aspect-[4/3] sm:aspect-video">
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
