<div x-data="highlight" class="px-4 py-12 sm:px-8">
    <div class="p-6 mx-auto rounded-lg max-w-7xl lg:p-8 bg-skin-fill-mantle">
        <div class="flex flex-col">
            <span class="mb-6 text-sm italic text-gray-600 dark:text-gray-300">
                Published {{ $post->published_at->format('m/d/Y') }}
            </span>
            <h1 class="mb-4 text-3xl font-bold leading-tight text-gray-700 lg:mb-8 sm:text-6xl font-protogrotesk dark:text-gray-300">
                {{ $post->title }}
            </h1>
            <div class="flex justify-center w-full py-4 mx-auto mb-4">
                <img alt="primary_post_image" src="{{ $post->primary_image }}" class="object-cover h-auto rounded-md shadow-md max-h-96">
            </div>
            <div class="!leading-relaxed trix-content first-letter:font-sans first-letter:text-2xl first-letter:bold
                first-letter:text-gray-700 text-gray-600 dark:first-letter:text-gray-400 dark:text-gray-300">
                {!! $post->body !!}
            </div>
        </div>
    </div>

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
