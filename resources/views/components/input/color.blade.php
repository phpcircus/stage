<div x-data="colorPicker">
    <label for="color-picker" class="block mb-1 font-semibold">Select a color</label>
    <div class="relative flex flex-row">
        <input x-on:click="isOpen = true" id="color-picker" class="p-2 border border-gray-400 rounded-lg"
            x-model="currentColor">
        <div @click="isOpen = !isOpen"
            class="flex w-10 h-10 my-auto ml-3 bg-indigo-600 rounded-full cursor-pointer"
            :class="`bg-${currentColor}`">
            <svg xmlns="http://www.w3.org/2000/svg" :class="`${iconColor}`"
                class="w-6 h-6 mx-auto my-auto text-white" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2"
                    d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01">
                </path>
            </svg>
        </div>
        <div x-show="isOpen" @click.away="isOpen = false"
            x-transition:enter="transition ease-out duration-100 transform"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75 transform"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute left-0 mt-2 origin-top-right border border-gray-300 rounded-md shadow-lg top-full"
            x-cloak>
            <div class="p-2 bg-white rounded-md shadow-xs">
                <div class="flex">
                    <template x-for="color in colors">
                        <div class="">
                            <template x-for="variant in variants">
                                <div x-on:click="selectColor(color,variant); isOpen = false;"
                                    class="w-6 h-6 mx-1 my-1 rounded-full cursor-pointer"
                                    :class="`bg-${color}-${variant}`"></div>
                            </template>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:initializing', function () {
                Alpine.data('colorPicker', () => ({
                    colors: ['red', 'yellow', 'green', 'blue', 'indigo', 'purple', 'pink'],
                    variants: [400, 500, 600, 700, 800, 900],
                    currentColor: @entangle($attributes->wire('model')),
                    iconColor: '',
                    isOpen: false,
                    init() {
                        this.setIconWhite()
                    },
                    setIconWhite () {
                        this.iconColor = 'text-white'
                    },
                    selectColor (color, variant) {
                        this.currentColor = color + '-' + variant
                        this.setIconWhite();
                    }
                }));
            });
        </script>
    @endpush
</div>