<div>
    <form wire:submit.prevent="save">
        <div class="mt-6 sm:mt-5">
            <x-input.group label="Title" for="title" :error="$errors->first('title')">
                <x-input.text wire:model="title" id="title" />
            </x-input.group>

            <x-input.group label="Summary" for="summary" :error="$errors->first('summary')">
                <x-input.textarea wire:model="summary" id="summary" />
            </x-input.group>

            <x-input.group label="Body" for="body" :error="$errors->first('body')"
                help-text="The content of the post.">
                <x-input.rich-text wire:model.defer="body" id="body" />
            </x-input.group>

            <x-input.group borderless paddingless for="active" label="Active?">
                <x-input.select wire:model="active" id="active">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </x-input.select>
            </x-input.group>

            <x-input.group label="Featured Image" for="image" :error="$errors->first('primaryImage')">
                <x-input.file-upload wire:model="primaryImage" id="image">
                    <span class="w-12 h-12 overflow-hidden bg-gray-100 rounded-full">
                        @if ($primaryImage)
                            <img src="{{ $primaryImage->temporaryUrl() }}" alt="Featured Image">
                        @else
                            <img src="/img/lightbulb.png" alt="Featured Image">
                        @endif
                    </span>
                </x-input.file-upload>
            </x-input.group>

            <x-input.group inline for="published_at" label="Published Date">
                <x-input.date wire:model="published_at" id="published_at" placeholder="MM/DD/YYYY" />
            </x-input.group>
        </div>

        <div class="pt-5 mt-8 border-t border-gray-200">
            <div class="flex items-center justify-end space-x-3">
                <span x-data="{ open: false }" x-init="
                        @this.on('notify-saved', () => {
                            if (open === false) setTimeout(() => { open = false }, 2500);
                            open = true;
                        })
                    " x-show.transition.out.duration.1000ms="open" style="display: none;"
                    class="text-gray-500">Saved!</span>

                <span class="inline-flex rounded-md shadow-sm">
                    <button type="button"
                        class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800">
                        Cancel
                    </button>
                </span>

                <span class="inline-flex rounded-md shadow-sm">
                    <button type="submit"
                        class="inline-flex justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700">
                        Save
                    </button>
                </span>
            </div>
        </div>
    </form>
</div>
