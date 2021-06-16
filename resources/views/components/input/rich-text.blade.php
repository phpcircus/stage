<div class="rounded-md shadow-sm" x-data="richText"
    x-on:trix-change="setValueOnChange($event)" {{ $attributes->whereDoesntStartWith('wire:model') }} wire:ignore>
    <input id="x" type="hidden" tabindex="0">
    <trix-editor id="trix" x-ref="trix" input="x" style="min-height: 350px;"
        class="block w-full transition duration-150 ease-in-out trix-content form-textarea sm:text-sm sm:leading-5"></trix-editor>

    @push('scripts')
        <script>
            document.addEventListener('alpine:initializing', function () {
                Alpine.data('richText', () => ({
                    value: @entangle($attributes->wire('model')),
                    isFocused() { return document.activeElement !== document.getElementById('trix') },
                    setValue() { document.getElementById('trix').editor.loadHTML(this.value) },
                    init() {
                        this.setValue();
                        this.$watch('value', () => this.isFocused() && this.setValue());
                        document.querySelectorAll('pre').forEach((el) => {
                            this.$nextTick(() => {
                                hljs.highlightElement(el);
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
