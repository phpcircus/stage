<div>
    <div class="flex flex-col mt-6 space-y-4 sm:mt-5">
        <x-input.group label="Title" for="title" :error="$errors->first('post.title')">
            <x-input.text wire:model.lazy="post.title" id="title" autocomplete="off" :focus="true" />
        </x-input.group>
        <x-input.group label="Summary" for="summary" :error="$errors->first('post.summary')">
            <x-input.textarea wire:model="post.summary" id="summary" />
        </x-input.group>
        <x-input.group label="Body" for="body" :error="$errors->first('post.body')">
            <x-input.rich-text wire:model.defer="post.body" id="body" />
        </x-input.group>
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-gray-400 sm:border-t sm:py-5">
            <label for="categories" class="block text-sm font-medium leading-5 text-gray-700 dark:text-gray-300 sm:mt-px sm:pt-2">
                Categories
            </label>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
                <div class="flex flex-wrap">
                    @forelse($categories as $key => $category)
                        <span wire:click="selectCategory({{ $key }})"
                            class="px-2 py-1 mb-2 mr-2 font-semibold border-2 border-indigo-700 dark:border-indigo-400 cursor-pointer rounded-lg {{ $categories[$key]['selected'] ? 'bg-indigo-600 text-white dark:bg-indigo-400' : 'bg-transparent text-indigo-600 dark:text-indigo-400' }}">
                            {{ $category['name'] }}
                        </span>
                    @empty
                    <span class="px-2 py-1 mb-2 mr-2 text-lg font-semibold text-gray-700">
                        No categories found
                    </span>
                    @endforelse
                </div>
                <div class="flex items-center mt-4">
                    <span class="mr-4 text-xs text-gray-600 uppercase dark:text-gray-400">Add Category</span>
                    <x-input.text wire:keydown.enter="addCategory" wire:model.defer="newCategory" id="new-category" />
                </div>
            </div>
        </div>
        <x-input.group label="Featured Image" for="image" :error="$errors->first('primaryImage')">
            <x-input.file-upload wire:model="primaryImage" id="image">
                <span class="overflow-hidden rounded-full">
                    @if ($primaryImage)
                        <img src="{{ $primaryImage->temporaryUrl() }}" class="object-cover w-12 h-12" alt="Featured Image">
                    @elseif ($primaryImageUrl)
                        <img src="{{ $primaryImageUrl }}" class="object-cover w-12 h-12" alt="Featured Image">
                    @else
                    <img src="/img/placeholder.jpg" class="object-cover w-12 h-12" alt="Featured Image">
                    @endif
                </span>
            </x-input.file-upload>
        </x-input.group>
        <x-input.group for="published_at" label="Published Date" :error="$errors->first('published_at')">
            <x-input.date wire:model="published_at" id="published_at" placeholder="MM/DD/YYYY" class="bg-origin-border" />
        </x-input.group>
    </div>
    <div class="pt-5 mt-8 border-t border-gray-400">
        <div class="flex items-center justify-end space-x-3">
            <x-button.link wire:click="cancel" class="mr-4">
                Cancel
            </x-button.link>
            <x-button.primary wire:click.prevent="save" class="group">
                Save
                <x-heroicon-o-chevron-right class="h-4 ml-2 text-white group-hover:hidden"></x-heroicon-chevron-right>
                <x-heroicon-o-arrow-right class="hidden h-4 ml-2 text-white group-hover:inline-block"></x-heroicon-chevron-right>
            </x-button.primary>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener("trix-initialize", (event) => {
                document.querySelectorAll('trix-toolbar .trix-button').forEach((el) => {
                    el.style.backgroundColor = '#FEFFFE';
                });
            });
        </script>
    @endpush
</div>
