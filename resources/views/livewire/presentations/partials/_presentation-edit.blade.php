<x-jet-dialog-modal wire:model="isEditModalVisible" :maxWidth="'sm'">
    <div class="px-6 py-4">
        <div class="text-lg">
            <x-slot name="title">
                {{ __('Edit presentation info') }}
            </x-slot>
        </div>

        <div class="mt-4">
            <x-slot name="content">
                <div>
                    <x-jet-label for="title" value="{{ __('Title') }}"/>
                    <x-jet-input wire:model.defer="title" class="block mt-1 w-full" type="text"
                                 required autofocus autocomplete="title"/>
                    <x-jet-input-error for="title"></x-jet-input-error>
                </div>

                <div class="mt-4">
                    <x-jet-label for="url" value="{{ __('URL') }}"/>
                    <x-jet-input wire:model.defer="url" class="block mt-1 w-full" type="text"
                                 required/>
                    <x-jet-input-error for="url"></x-jet-input-error>
                </div>

                <div class="mt-4">
                    <x-jet-label for="comments" class="mb-1"  value="{{ __('Comments') }}" />
                    <textarea wire:model.defer="comments" name="comments" rows="10" class="w-full border-gray-200 shadow-sm rounded-md"></textarea>
                </div>

                <div class="mt-4">
                    <x-jet-label for="company" class="mb-1"  value="{{ __('Company presentation?') }}" />
                    <x-jet-checkbox wire:model.defer="isCompany" value="1" />
                </div>
            </x-slot>
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 text-right">
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('isEditModalVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-button wire:click="updatePresentation" wire:loading.attr="disabled">
                {{ __('Update') }}
            </x-jet-button>
        </x-slot>
    </div>
</x-jet-dialog-modal>
