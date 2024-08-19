<x-jet-dialog-modal wire:model="isModalVisible" :id="''" :maxWidth="'lg'">
    <div class="px-6 py-4">
        <div class="text-lg">
            <x-slot name="title">
                {{ __('Create new user') }}
            </x-slot>
        </div>

        <div class="mt-4">
            <x-slot name="content">
                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}"/>
                    <x-jet-input wire:model.defer="name" id="name" class="block mt-1 w-full" type="text"
                                 required autofocus autocomplete="name"/>
                    <x-jet-input-error for="name"></x-jet-input-error>
                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Email') }}"/>
                    <x-jet-input wire:model.defer="email" id="email" class="block mt-1 w-full" type="email"
                                 required/>
                    <x-jet-input-error for="email"></x-jet-input-error>
                </div>

                <div class="grid grid-cols-2 gap-2">
                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}"/>
                        <x-jet-input wire:model.defer="password" id="password" class="block mt-1 w-full"
                                     type="password" required autocomplete="new-password"/>
                        <x-jet-input-error for="password"></x-jet-input-error>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}"/>
                        <x-jet-input wire:model.defer="password_confirmation" id="password_confirmation"
                                     class="block mt-1 w-full" type="password" required autocomplete="new-password"/>
                        <x-jet-input-error for="password_confirmation"></x-jet-input-error>
                    </div>
                </div>
                <!-- Role -->
                @if (count($this->roles) > 0)
                    <div class="col-span-6 sm:col-span-4 mt-4">
                        <x-jet-label for="role" value="{{ __('Role') }}" />
                        <x-jet-input-error for="role" class="mt-2" />

                        <div class="relative z-0 mt-1 border border-gray-200 rounded-lg cursor-pointer">
                            @foreach ($this->roles as $index => $role)
                                <button type="button" class="capitalize relative px-4 py-3 inline-flex w-full rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue {{ $index > 0 ? 'border-t border-gray-200 rounded-t-none' : '' }} {{ ! $loop->last ? 'rounded-b-none' : '' }}"
                                        wire:click="$set('userRole', '{{ $role->name }}')">
                                    <div class="{{ isset($userRole) && $userRole !== $role->name ? 'opacity-50' : '' }}">
                                        <!-- Role Name -->
                                        <div class="flex items-center">
                                            <div class="text-sm text-gray-600 {{ $userRole === $role->name ? 'font-semibold' : '' }}">
                                                {{ $role->name }}
                                            </div>

                                            @if ($userRole === $role->name)
                                                <svg class="ml-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            @endif
                                        </div>
                                    </div>
                                </button>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="mt-4">
                    <x-jet-label for="position" value="{{ __('Position (Job)') }}"/>
                    <x-jet-input wire:model.defer="position" id="position" class="block mt-1 w-full" type="text" required/>
                    <x-jet-input-error for="position"></x-jet-input-error>
                </div>
            </x-slot>
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 text-right">
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('isModalVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-button wire:click="createUserAndAssignToCurrentTeam" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </div>
</x-jet-dialog-modal>
