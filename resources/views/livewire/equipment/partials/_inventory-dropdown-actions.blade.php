<div class="hidden sm:flex sm:items-center sm:ml-6">
    <div class="ml-3 absolute">
        <x-jet-dropdown align="right" width="60">
            <x-slot name="trigger">
                <span class="inline-flex rounded-md">
                    <button type="button" class="inline-flex items-center p-2 border border-transparent text-sm leading-4 font-medium rounded-full text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                        <svg class="h-4 w-4"
                             xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </button>
                </span>
            </x-slot>

            <x-slot name="content">
                <div class="w-52 z-50">
                    @if($device->charged === 0)
                        <x-jet-dropdown-link wire:click="showChargeToEmployeeModal({{ $device->id }})" class="cursor-pointer text-gray-500">
                            {{ __('Charge to employee') }}
                        </x-jet-dropdown-link>
                        <hr>
                    @endif

                    <x-jet-dropdown-link wire:click="showChargeHistoryModal({{ $device->id }})" class="cursor-pointer text-gray-500">
                        {{ __('Charge history') }}
                    </x-jet-dropdown-link>
                    <hr class="border-2">

                    <x-jet-dropdown-link wire:click="showEditModal({{ $device->id }})" class="cursor-pointer text-indigo-500">
                        {{ __('Quick edit') }}
                    </x-jet-dropdown-link>
                    <hr>

                    <x-jet-dropdown-link wire:click="showDestroyModal({{ $device->id }})" class="text-pink-500 cursor-pointer">
                        {{ __('Delete') }}
                    </x-jet-dropdown-link>
                </div>
            </x-slot>
        </x-jet-dropdown>
    </div>
</div>
