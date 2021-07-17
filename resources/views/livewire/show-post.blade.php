<div x-data="highlight" class="px-4 py-12 sm:px-8">
    <div class="p-6 mx-auto rounded-lg shadow-md max-w-7xl lg:p-8 bg-skin-fill-mantle">
        <div class="flex flex-col">
            <span class="mb-6 text-sm italic text-skin-quiet">
                Published {{ $post->published_at->format('m/d/Y') }}
            </span>
            <h1 class="mb-2 text-3xl font-bold leading-tight lg:mb-4 sm:text-6xl font-protogrotesk text-skin-loud">
                {{ $post->title }}
            </h1>
            <div class="flex flex-wrap mb-2 -mx-2">
                @foreach($post->categories as $category)
                    <div class="flex items-center mx-2 mb-2">
                        <a href="{{ route('posts', [ 'category' => $category->name ]) }}">
                            <span class="border border-transparent py-[.35rem] px-4 bg-{{ $category->color }} rounded-full leading-3 uppercase inline-block text-[length:.63rem] font-bold font-coda text-white
                                hover:bg-transparent hover:border-{{$category->color }} hover:text-{{$category->color }}">
                                {{ $category->name }}
                            </span>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="flex justify-center w-full py-4 mx-auto mb-4">
                <img alt="primary_post_image" src="{{ $post->primary_image }}" class="object-cover h-auto rounded-md shadow-md ring-2 ring-gray-200/50 ring-offset-2 ring-offset-gray-50 dark:ring-offset-gray-800 max-h-96">
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
            document.addEventListener('alpine:initializing', function () {
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
