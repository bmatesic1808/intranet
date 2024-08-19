<x-jet-dialog-modal wire:model="isChargeToEmployeeModalVisible" :id="''" :maxWidth="'2xl'">
    <div class="px-6 py-4">
        <div class="text-lg">
            <x-slot name="title">
                {{ __('Charge device to employee') }}
            </x-slot>
        </div>

        <div class="mt-4">
            <x-slot name="content">
                <div class="col-span-6 sm:col-span-4 mt-4">
                    <div class="relative z-0 mt-1 cursor-pointer" style="column-count: 2">
                        @foreach ($users as $index => $user)
                            <div class="{{ $loop->first ? '' : 'mt-1' }}">
                                <button type="button" class="relative px-4 py-3 inline-flex w-full rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue border"
                                        wire:click="$set('userEmail', '{{ $user->email }}')">
                                    <div class="{{ isset($userEmail) && $userEmail !== $user->email ? 'opacity-50' : '' }}">
                                        <div class="flex items-center">
                                            <div class="text-sm text-gray-600 {{ $userEmail === $user->email ? 'font-semibold' : '' }}">
                                                {{ $user->name }}
                                            </div>

                                            @if ($userEmail === $user->email)
                                                <svg class="ml-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            @endif
                                        </div>
                                    </div>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </x-slot>
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 text-right">
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('isChargeToEmployeeModalVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-button wire:click="chargeDeviceToEmployee" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </div>
</x-jet-dialog-modal>
