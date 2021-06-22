<div class="rounded-md shadow-sm" x-data="richText" x-effect="setValueIfFocused()"
    x-on:trix-change="setValueOnChange($event)" {{ $attributes->whereDoesntStartWith('wire:model') }} wire:ignore>
    <input id="x" type="hidden" tabindex="0">
    <trix-editor id="trix" x-ref="trix" input="x" style="min-height: 350px;"
        class="block w-full transition duration-150 ease-in-out bg-[#FEFFFE] rounded-lg trix-content form-textarea sm:text-sm sm:leading-5 focus:border-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:ring-indigo-300"></trix-editor>

    @push('scripts')
        <script>
            document.addEventListener('alpine:initializing', function () {
                Alpine.data('richText', () => ({
                    value: @entangle($attributes->wire('model')),
                    isFocused () { return document.activeElement !== document.getElementById('trix') },
                    setValue () { document.getElementById('trix').editor.loadHTML(this.value) },
                    setValueIfFocused () {
                        this.isFocused() && this.setValue();
                    },
                    init() {
                        this.setValue();
                        document.querySelectorAll('pre').forEach((el) => {
                            this.$nextTick(() => {
                                hljs.highlightElement(el);
                            });
                        });
                        document.addEventListener("trix-initialize", (event) => {
                            document.querySelectorAll('trix-toolbar .trix-button').forEach((el) => {
                                el.style.backgroundColor = '#FEFFFE';
                            });
                        });
                    },
                    setValueOnChange(event) {
                        this.value = event.target.value;
                    }
                }));
            });
        </script>
    @endpush
</div>
