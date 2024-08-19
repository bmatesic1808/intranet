<x-jet-dialog-modal wire:model="isEditModalVisible" :maxWidth="'sm'">
    <div class="px-6 py-4">
        <div class="text-lg">
            <x-slot name="title">
                {{ __('Edit device info') }}
            </x-slot>
        </div>

        <div class="mt-4">
            <x-slot name="content">
                <div>
                    <x-jet-label for="name" value="{{ __('Type') }}"/>
                    <x-jet-input wire:model.defer="type" id="type" class="block mt-1 w-full" type="text"
                                 required autofocus autocomplete="type"/>
                    <x-jet-input-error for="type"></x-jet-input-error>
                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Brand') }}"/>
                    <x-jet-input wire:model.defer="brand" id="brand" class="block mt-1 w-full" type="text"
                                 required/>
                    <x-jet-input-error for="brand"></x-jet-input-error>
                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Model') }}"/>
                    <x-jet-input wire:model.defer="model" id="model" class="block mt-1 w-full" type="text"
                                 required/>
                    <x-jet-input-error for="model"></x-jet-input-error>
                </div>

                <div class="grid grid-cols-2 gap-2">
                    <div class="mt-4">
                        <x-jet-label for="email" value="{{ __('Serial number') }}"/>
                        <x-jet-input wire:model.defer="serialNumber" id="serialNumber" class="block mt-1 w-full" type="text"
                                     required/>
                        <x-jet-input-error for="serialNumber"></x-jet-input-error>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="email" value="{{ __('Inventory number') }}"/>
                        <x-jet-input wire:model.defer="inventoryNumber" id="inventoryNumber" class="block mt-1 w-full" type="text"
                                     required/>
                        <x-jet-input-error for="inventoryNumber"></x-jet-input-error>
                    </div>
                </div>
            </x-slot>
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 text-right">
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('isEditModalVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-button wire:click="updateDevice" wire:loading.attr="disabled">
                {{ __('Update') }}
            </x-jet-button>
        </x-slot>
    </div>
</x-jet-dialog-modal>
