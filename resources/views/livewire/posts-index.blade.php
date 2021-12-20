<div class="flex flex-col p-4 space-y-4 lg:p-6">
    <div class="flex w-full xl:w-1/2">
        <div class="flex flex-col w-full md:items-center md:flex-row">
            <div class="flex flex-col w-full mb-2 mr-4 space-y-2 md:mb-0">
                <x-input.select wire:model="category" id="category" class="w-full md:w-1/3">
                    <option wire:click="$set('category', '')" value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option wire:click="$set('category', {{ $category->name }})">{{ $category->name }}</option>
                    @endforeach
                </x-input.select>
                <div class="flex flex-col items-center w-full md:flex-row">
                    <div class="w-full mb-2 md:w-2/3 md:mb-0">
                        <x-input.text wire:keydown.enter="search" wire:model.defer="search" id="search">
                            <x-slot name="leadingAddOn">
                                <x-heroicon-o-search class="w-5 text-gray-500" />
                            </x-slot>
                        </x-input.text>
                    </div>
                    <div class="flex w-full space-x-4 md:w-1/3 md:ml-2">
                        <x-button.primary wire:click="search" x-cloak
                            class="text-gray-800 bg-gray-200 border-gray-300 shadow hover:shadow-none hover:border-transparent hover:text-gray-400 dark:border-gray-300 dark:text-gray-300 dark:bg-gray-800 dark:hover:border-gray-400 dark:hover:text-gray-400">
                            Search
                        </x-button.primary>
                        <x-button.link wire:click="resetSearch"
                            class="ml-auto hover:text-gray-400 dark:text-gray-300 dark:hover:text-gray-400">
                            Clear
                        </x-button.link>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="pt-6 mb-2 space-y-8 font-sans">
        @forelse($posts as $post)
            <li class="pt-4 mb-4 first:pt-0 group-link-underline">
                <div class="flex flex-col">
                    <div
                        class="flex flex-col mb-1 space-y-4 md:mb-2 md:space-y-0 md:items-center md:flex-row {{ $post->categories->count() > 0 ? 'md:space-x-4' : '' }}">
                        <x-categories :categories="$post->categories" />
                        <p class="font-mono text-xs font-normal text-slate-500 dark:text-slate-400">
                            {{ $post->published_at->diffForHumans() }}</p>
                    </div>
                    <a href="{{ route('posts.show', $post->slug) }}" class="block">
                        <span
                            class="font-sans text-2xl font-semibold tracking-tight text-slate-800 dark:text-white link link-underline">
                            {{ $post->title }}
                        </span>
                    </a>
                    <p class="mt-2 font-sans text-base font-semibold text-slate-600 dark:text-slate-300">
                        {{ $post->summary }}
                    </p>
                </div>
            </li>
        @empty
            <li>
                <h1 class="w-full mt-4 text-3xl text-gray-700 lg:col-span-6 font-protogrotesk">No Posts Found. 🙁</h1>
            </li>
        @endforelse
    </ul>
    {{ $posts->links() }}
</div>
