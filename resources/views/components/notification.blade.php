<div x-data="notification"
            class="absolute top-0 left-0 w-full"
            x-bind:class="{ 'bg-indigo-500': style == 'success', 'bg-red-500': style == 'danger' }"
            style="display: none; z-index: 100"
            x-on:banner-message.window="setNotificationDetailsFromEvent($event)"
            x-show="show">
    <div class="max-w-screen-xl px-3 py-2 mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-wrap items-center justify-between">
            <div class="flex items-center flex-1 w-0 min-w-0">
                <span class="flex p-2 rounded-lg" :class="{ 'bg-indigo-600': style == 'success', 'bg-red-600/50': style == 'danger' }">
                    <x-heroicon-o-check-circle x-show="style == 'success'" class="w-5 h-5 text-white" />
                    <x-heroicon-o-x-circle x-show="style == 'danger'" class="w-5 h-5 text-white" />
                </span>

                <p class="ml-3 text-sm font-medium text-white truncate" x-text="message"></p>
            </div>

            <div class="flex-shrink-0 sm:ml-3">
                <button
                    type="button"
                    class="flex p-2 -mr-1 transition rounded-md focus:outline-none sm:-mr-2"
                    :class="{ 'hover:bg-indigo-600 focus:bg-indigo-600': style == 'success', 'hover:bg-red-600/50 focus:bg-red-600/50': style == 'danger' }"
                    aria-label="Dismiss"
                    x-on:click="show = false">
                    <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:initializing', function () {
                Alpine.data('notification', () => ({
                    fromSession: false,
                    show: false,
                    style: 'info',
                    message: '',
                    time: 3500,
                    init() {
                        this.fromSession = '{{ session()->has('banner.message') }}';
                        if(this.fromSession) {
                            this.style = '{{ session()->get('banner.style') ?? 'info' }}';
                            this.message = '{{ session()->get('banner.message') ?? 'Notice' }}';
                            this.time = '{{ session()->get('banner.time') }}';
                            this.show = true;
                            if(this.time) {
                                setTimeout(() => this.show = false, this.time);
                            }
                        }
                    },
                    hideNotification() {
                        this.show = false;
                    },
                    setNotificationDetailsFromEvent(event) {
                        this.style = event.detail.style;
                        this.message = event.detail.message;
                        this.time = event.detail.time;
                        this.show = true;
                        if(this.time) {
                            setTimeout(() => this.show = false, this.time);
                        }
                    },
                }));
            });
        </script>
    @endpush
</div>
