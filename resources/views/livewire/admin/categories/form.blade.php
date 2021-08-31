<div class="min-h-[500px]">
    <div class="mt-6 sm:mt-5">
        <x-input.group label="Name" for="name" :error="$errors->first('name')">
            <x-input.text wire:model="name" id="name" :focus="true" />
        </x-input.group>
        <x-input.group label="Color" for="color" :error="$errors->first('color')">
            <x-input.color wire:model="color" id="color" />
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
</div>
