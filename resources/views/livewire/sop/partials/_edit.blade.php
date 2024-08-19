<x-jet-dialog-modal wire:model="isEditModalVisible" :maxWidth="'sm'">
    <div class="px-6 py-4">
        <div class="text-lg">
            <x-slot name="title">
                {{ __('Edit category name') }}
            </x-slot>
        </div>

        <div class="mt-4">
            <x-slot name="content">
                <div>
                    <x-jet-label for="sopCategoryNewName" value="{{ __('Name') }}"/>
                    <x-jet-input wire:model.defer="sopCategoryNewName" class="block mt-1 w-full" type="text"
                                 required autofocus autocomplete="sopCategoryNewName"/>
                    <x-jet-input-error for="sopCategoryNewName"></x-jet-input-error>
                </div>
            </x-slot>
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 text-right">
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('isEditModalVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-button wire:click="updateSopCategory" wire:loading.attr="disabled">
                {{ __('Update') }}
            </x-jet-button>
        </x-slot>
    </div>
</x-jet-dialog-modal>
