<div>
    <div class="mt-6 sm:mt-5">
        <x-input.group label="Name" for="name" :error="$errors->first('name')">
            <x-input.text wire:model="name" id="name" />
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
