<x-app-layout>
    <div class="px-4 py-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
        <x-page-hero>
            <h1 class="text-4xl font-bold uppercase sm:text-6xl text-slate-800 dark:text-slate-300 font-lemonmilk">My Posts</h1>
        </x-page-hero>
        <div class="pb-6 mx-auto space-y-4 rounded-lg lg:pb-8">
            <livewire:posts-index />
        </div>
    </div>
</x-app-layout>
