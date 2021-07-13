<div x-data="date" x-on:change="setValueOnChange($event)" class="relative flex w-full h-10 rounded-md shadow-sm lg:w-1/4">
    <input {{ $attributes->whereDoesntStartWith('wire:model')->merge([
        "class" => "peer absolute left-11 h-full flex-1 block w-full p-2 transition duration-150 ease-in-out border border-l-0 border-gray-300 rounded-none rounded-r-md form-input sm:text-sm sm:leading-5 !ring-0 focus:!ring-0 outline-none bg-clip-padding focus:ring-none focus:border-2 focus:border-indigo-500 dark:focus:border-indigo-300 focus:border-l-0",
    ]) }}
        tabindex="0"
        x-ref="field"
        x-bind:value="value"
        autocomplete="off"
        type="text" />

        <div x-on:click="showPicker()"
            class="absolute left-0 inline-flex items-center h-full px-3 text-gray-500 bg-gray-100 border border-r-0 border-gray-300 rounded-none cursor-pointer bg-red rounded-l-md sm:text-sm peer-focus:border-2 peer-focus:border-indigo-500 dark:peer-focus:border-indigo-300 peer-focus:border-r-0">
            <x-heroicon-o-calendar class="w-5 h-5 text-gray-400" />
        </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:initializing', () => {
                Alpine.data('date', () => ({
                    value: @entangle($attributes->wire('model')),
                    picker: undefined,
                    init() {
                        const elem = this.$refs.field;
                        this.picker = new Pikaday({ field: elem, format: 'MM/DD/YYYY', onOpen() { this.setDate(elem.value) } });
                    },
                    setValueOnChange(event) {
                        this.value = event.target.value;
                    },
                    showPicker() {
                        this.picker.show();
                    }
                }));
            });
        </script>
    @endpush
</div>
