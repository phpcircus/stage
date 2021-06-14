<div class="rounded-md shadow-sm" x-data="richText()" x-init="init($watch)"
    x-on:trix-change="setValueOnChange($event)" {{ $attributes->whereDoesntStartWith('wire:model') }} wire:ignore>
    <input id="x" type="hidden" tabindex="0">
    <trix-editor id="trix" x-ref="trix" input="x" style="min-height: 350px;"
        class="block w-full transition duration-150 ease-in-out trix-content form-textarea sm:text-sm sm:leading-5"></trix-editor>

    @push('scripts')
        <script>
            function richText() {
                return {
                    value: @entangle($attributes->wire('model')),
                    isFocused() { return document.activeElement !== document.getElementById('trix') },
                    setValue() { document.getElementById('trix').editor.loadHTML(this.value) },
                    init(watch) {
                        this.setValue();
                        watch('value', () => this.isFocused() && this.setValue());
                    },
                    setValueOnChange(event) {
                        this.value = event.target.value;
                    }
                }
            }
        </script>
    @endpush
</div>
