<x-jet-dialog-modal wire:model="isOvertimeWorkModalVisible" :id="''" :maxWidth="'4xl'">
    <div class="px-6 py-4">
        <div class="text-lg">
            <x-slot name="title">
                {{ __('Overtime work per month') }}
            </x-slot>
        </div>

        <div class="mt-4">
            <x-slot name="content">
                <div class="grid grid-cols-2 gap-2 mt-5">
                    <div>
                        <x-jet-label for="overtimeHours" value="{{ __('Hours') }}"/>
                        <x-jet-input wire:model.defer="overtimeHours" id="overtimeHours" class="block mt-1 w-full" type="number" min="0"
                                     required autofocus autocomplete="overtimeHours"/>
                        <x-jet-input-error for="overtimeHours"></x-jet-input-error>
                    </div>

                    <div>
                        <x-jet-label for="overtimeHoursComment" value="{{ __('Comments') }}"/>
                        <x-jet-input wire:model.defer="overtimeHoursComment" id="overtimeHoursComment" class="block mt-1 w-full" type="text"
                                     required autofocus autocomplete="overtimeHoursComment"/>
                        <x-jet-input-error for="overtimeHoursComment"></x-jet-input-error>
                    </div>
                </div>

                @if($overtimeHoursRecords->isNotEmpty())
                    <div class="mt-5">
                        @foreach($overtimeHoursRecords as $record)
                            <div class="flex bg-gray-50 text-gray-700 py-2 px-3 rounded-lg justify-between mt-1 items-center">
                                <div class="">{{ __('Overtime hours: ') }} <b>{{ $record->hours }}</b></div>
                                <div class="flex">
                                    <x-jet-input wire:model.defer="overtimeHoursRemoval" class="mr-1" type="number" placeholder="Hours" />
                                    <x-jet-input wire:model.defer="overtimeHoursRemovalComment" class="mr-1" type="text" placeholder="Comment..." />
                                    <x-jet-secondary-button wire:click="removeOvertimeHours({{ $record->id }})" wire:loading.attr="enabled">
                                        {{ __('Delete') }}
                                    </x-jet-secondary-button>
                                </div>
                                <x-jet-action-message class="ml-1" on="saved">
                                    {{ __('Updated.') }}
                                </x-jet-action-message>
                            </div>

                            <div class="mt-5 flex flex-col">
                                @foreach($record->overtimeActivities as $activity)
                                    <div class="bg-blue-50 py-2 px-3 mb-1 rounded-md flex justify-between">
                                        <div class="mr-5">
                                            <span><strong>{{ $activity->hours . ' h,' }}</strong></span>
                                            <small>{{ $activity->created_at->format('d/m/Y') }}</small>
                                        </div>
                                        <div class="text-right">
                                            <span>{{ $activity->comments }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                @endif
            </x-slot>
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 text-right">
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('isOvertimeWorkModalVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-button wire:click="addOvertimeHoursToUser" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </div>
</x-jet-dialog-modal>
