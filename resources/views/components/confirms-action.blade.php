@props([
    'title' => __('Confirm Action'),
    'content' => __('Please confirm this action before continuing.'),
    'button' => __('Confirm'),
])

@php
    $confirmableId = $attributes->get('confirmable')
@endphp

<span
    {{ $attributes->wire('then') }}
    x-data
    x-ref="span"
    x-on:click="$wire.startConfirmingAction('{{ $confirmableId }}')"
    x-on:action-confirmed.window="setTimeout(() => $refs.span.dispatchEvent(new CustomEvent('then', { bubbles: false })), 250);"
>
    {{ $slot }}
</span>

@once
<x-jet-dialog-modal wire:model="confirmingAction">
    <x-slot name="title">
        {{ $title }}
    </x-slot>

    <x-slot name="content">
        {{ $content }}
        @if ($this->confirmsPassword)
            <div class="mt-4" x-data="{}" x-on:confirming-action.window="setTimeout(() => $refs.confirmable_password.focus(), 250)">
                <x-input.confirm-password type="password" class="block w-3/4 mt-1" placeholder="{{ __('Password') }}"
                    x-ref="confirmable_password"
                    wire:model.defer="confirmablePassword"
                    wire:keydown.enter="confirmAction()" />

                <x-input.input-error for="confirmable_password" class="mt-2" />
            </div>
        @endif
    </x-slot>

    <x-slot name="footer">
        <x-button.link wire:click="stopConfirmingAction" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-button.link>

        <x-button.primary class="ml-2" wire:click="confirmAction()" wire:loading.attr="disabled">
            {{ $button }}
        </x-button.primary>
    </x-slot>
</x-jet-dialog-modal>
@endonce
