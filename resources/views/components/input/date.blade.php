<div x-data="date" x-on:change="setValueOnChange($event)" class="w-full lg:w-1/4">
    <div class="flex mt-1 rounded-md shadow-sm">
        <div class="relative flex items-stretch flex-grow focus-within:z-10">
            <div
                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <!-- Heroicon name: calendar -->
                <x-heroicon-s-calendar class="w-5 h-5 text-gray-400" />
            </div>
            <input type="text"
                class="block w-full pl-10 border-gray-300 rounded-r-md focus:ring-indigo-500 focus:border-indigo-500 rounded-l-md sm:text-sm"
                tabindex="0"
                x-ref="field"
                x-bind:value="value"
                autocomplete="off"
                type="text">
        </div>
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
