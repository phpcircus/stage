<div>
    <div class="mt-6 sm:mt-5">
        <x-input.group label="Title" for="title" :error="$errors->first('title')">
            <x-input.text wire:model="title" id="title" />
        </x-input.group>
        <x-input.group label="Summary" for="summary" :error="$errors->first('summary')">
            <x-input.textarea wire:model="summary" id="summary" />
        </x-input.group>
        <x-input.group label="Body" for="body" :error="$errors->first('body')">
            <x-input.rich-text wire:model.defer="body" id="body" />
        </x-input.group>
        <x-input.group label="Categories" for="categories" :error="$errors->first('categories')">
            <x-input.multiselect wire:model.defer="selectedCategories" id="categories" :options="$categories" />
        </x-input.group>
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
            <x-input.date wire:model="published_at" id="published_at" placeholder="MM/DD/YYYY" />
        </x-input.group>
    </div>
    <div class="pt-5 mt-8 border-t border-gray-200">
        <div class="flex items-center justify-end space-x-3">
            <x-button.secondary wire:click="cancel">
                Cancel
            </x-button.secondary>
            <x-button.primary wire:click.prevent="save">
                Save
            </x-button.primary>
        </div>
    </div>
</div>
