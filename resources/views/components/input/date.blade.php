<div x-data="date"
    x-on:change="setValueOnChange($event)" class="flex w-full rounded-md shadow-sm lg:w-1/4">
    <span
        class="inline-flex items-center px-3 text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50 sm:text-sm">
        <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M6 2C5.44772 2 5 2.44772 5 3V4H4C2.89543 4 2 4.89543 2 6V16C2 17.1046 2.89543 18 4 18H16C17.1046 18 18 17.1046 18 16V6C18 4.89543 17.1046 4 16 4H15V3C15 2.44772 14.5523 2 14 2C13.4477 2 13 2.44772 13 3V4H7V3C7 2.44772 6.55228 2 6 2ZM6 7C5.44772 7 5 7.44772 5 8C5 8.55228 5.44772 9 6 9H14C14.5523 9 15 8.55228 15 8C15 7.44772 14.5523 7 14 7H6Z" />
        </svg>
    </span>

    <input {{ $attributes->whereDoesntStartWith('wire:model')->merge([
            'class' => 'flex-1 block w-full p-2 transition duration-150 ease-in-out border border-l-0 border-gray-300 rounded-none rounded-r-md form-input sm:text-sm sm:leading-5'
        ]) }}
        tabindex="0"
        x-bind:value="value"
        autocomplete="off"
        type="text" />

    @push('scripts')
        <script>
            document.addEventListener('alpine:initializing', () => {
                Alpine.data('date', () => ({
                    value: @entangle($attributes->wire('model')),
                    picker: undefined,
                    init() {
                        const elem = document.querySelector('.date-field');
                        return new Pikaday({ field: elem, format: 'MM/DD/YYYY', onOpen() { this.setDate(elem.value) } });
                    },
                    setValueOnChange(event) {
                        this.value = event.target.value;
                    },
                }));
            });
        </script>
    @endpush
</div>
