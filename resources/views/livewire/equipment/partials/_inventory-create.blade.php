<x-jet-dialog-modal wire:model="isModalVisible" :id="''" :maxWidth="'sm'">
    <div class="px-6 py-4">
        <div class="text-lg">
            <x-slot name="title">
                {{ __('Add new device') }}
            </x-slot>
        </div>

        <div class="mt-4">
            <x-slot name="content">
                <div>
                    <x-jet-label for="name" value="{{ __('Item') }}"/>
                    <x-jet-input wire:model.defer="item" id="item" class="block mt-1 w-full" type="text"
                                  autofocus autocomplete="item"/>
                    <x-jet-input-error for="item"></x-jet-input-error>
                </div>

                <div class="grid grid-cols-2 gap-2">
                    <div class="mt-4">
                        <x-jet-label for="email" value="{{ __('Serial number') }}"/>
                        <x-jet-input wire:model.defer="serialNumber" id="serialNumber" class="block mt-1 w-full" type="text"
                                     />
                        <x-jet-input-error for="serialNumber"></x-jet-input-error>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="email" value="{{ __('Inventory number') }}"/>
                        <x-jet-input wire:model.defer="inventoryNumber" id="inventoryNumber" class="block mt-1 w-full" type="text"
                                     />
                        <x-jet-input-error for="inventoryNumber"></x-jet-input-error>
                    </div>
                </div>
            </x-slot>
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 text-right">
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('isModalVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-button wire:click="createDevice" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </div>
</x-jet-dialog-modal>
