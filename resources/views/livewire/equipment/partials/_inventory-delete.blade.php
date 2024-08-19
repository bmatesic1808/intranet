<x-jet-dialog-modal wire:model="isDestroyModalVisible">
    <x-slot name="title">
        {{ __('Delete Device') }}
    </x-slot>

    <x-slot name="content">
        {{ __('Are you sure you want to delete this device?') }}
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('isDestroyModalVisible')" wire:loading.attr="disabled">
            {{ __('Nevermind') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="deleteDevice" wire:loading.attr="disabled">
            {{ __('Delete device') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>
