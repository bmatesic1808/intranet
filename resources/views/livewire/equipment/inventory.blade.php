<div>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-between">
            <x-jet-input id="searchTerm" type="text" wire:model="searchTerm" placeholder="Search..." />

             @can('create_users')
                <x-jet-button wire:click="showCreateModal" class="font-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-2">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                              clip-rule="evenodd"/>
                    </svg>
                    {{ __('Add Device') }}
                </x-jet-button>
            @endcan
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
            @include('livewire.equipment.partials._inventory-index')
        </div>
    </div>

    @include('livewire.equipment.partials._inventory-create')
    @include('livewire.equipment.partials._inventory-edit')
    @include('livewire.equipment.partials._inventory-delete')
    @include('livewire.equipment.partials._inventory-charge-history-modal')
    @include('livewire.equipment.partials._inventory-charge-to-employee-modal')
</div>
