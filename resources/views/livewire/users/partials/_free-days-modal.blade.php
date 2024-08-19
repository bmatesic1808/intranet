<x-jet-dialog-modal wire:model="isFreeDaysModalVisible" :id="''" :maxWidth="'lg'">
    <div class="px-6 py-4">
        <div class="text-lg">
            <x-slot name="title">
                {{ __('Add vacation days per year') }}
            </x-slot>
        </div>

        <div class="mt-4">
            <x-slot name="content">
                <div class="grid grid-cols-2 gap-2 mt-5">
                    <div>
                        <x-jet-label for="freeDaysYear" value="{{ __('Year') }}"/>
                        <x-jet-input wire:model.defer="freeDaysYear" id="freeDaysYear" class="block mt-1 w-full" type="text"
                                     required/>
                        <x-jet-input-error for="freeDaysYear"></x-jet-input-error>
                    </div>

                    <div>
                        <x-jet-label for="freeDays" value="{{ __('Days') }}"/>
                        <x-jet-input wire:model.defer="freeDays" id="freeDays" class="block mt-1 w-full" type="number" min="0"
                                     required autofocus autocomplete="freeDays"/>
                        <x-jet-input-error for="freeDays"></x-jet-input-error>
                    </div>
                </div>

                @if($freeDaysRecords->isNotEmpty())
                    <div class="mt-5">
                        @foreach($freeDaysRecords as $record)
                            <div class="flex bg-gray-50 text-gray-700 py-2 px-3 rounded-lg justify-between mt-1 text-sm">
                                <div class="">{{ __('Year: ') }} <b>{{ $record->year }}</b></div>
                                <div class="">{{ __('Vacation days: ') }} <b>{{ $record->days }}</b></div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </x-slot>
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 text-right">
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('isFreeDaysModalVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-button wire:click="addFreeDaysByYearForUser" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </div>
</x-jet-dialog-modal>
