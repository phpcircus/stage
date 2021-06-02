@props(['options'])
<div x-data="{
    options: {{ $options }},
    selected: @entangle($attributes->wire('model')).defer,
    toggleOption(id) {
        if (this.selected.indexOf(id) > -1) {
          this.selected = this.selected.filter(s => s !== id)
        } else {
            this.selected.push(id)
        }
    },
    optionSelected(id) {
        return this.selected.indexOf(id) > -1;
    },
    loadOptions() {
        for(let i=0; i < this.options.length; i++) {
            if(this.options[i].selected) {
                this.selected.push(this.options[i].id);
            }
        }
    }
}" x-init="loadOptions()" class="flex space-x-4 space-y-6">

    <template x-for="option in options">
        <div x-on:click="toggleOption(option.id)" class="flex">
            <div class="w-6 h-6 mr-2 border-2 border-indigo-700" :class="{ 'bg-indigo-600': optionSelected(option.id) }">
                <x-heroicon-o-check class="h-5 font-semibold text-white" x-cloak x-show="optionSelected(option.id)" />
            </div>
            <div>
                <span class="block text-sm font-bold" x-text="option.name"></span>
            </div>
        </div>
    </template>
    <input x-model="selected" type="hidden" name="multiselect">
</div>
