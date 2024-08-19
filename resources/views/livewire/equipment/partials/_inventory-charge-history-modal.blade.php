<x-jet-dialog-modal wire:model="isChargeHistoryModalVisible" :id="''" :maxWidth="'lg'">
    <div class="px-6 py-4">
        <div class="text-lg">
            <x-slot name="title">
                {{ __('Charge history for device') }}
            </x-slot>
        </div>

        <div class="mt-4">
            <x-slot name="content">
                @forelse($charges as $charge)
                    <div class="flex justify-between bg-gray-50 text-gray-700 rounded-lg py-2 mb-1 px-2 items-center">
                        <div class="font-semibold">
                            {{ $charge->user->name }}
                        </div>

                        <div class="text-sm">
                            {{ $charge->date_charged->format('d/m/Y') }} -

                            @if($charge->date_discharged)
                                {{ $charge->date_discharged->format('d/m/Y') }}
                            @else
                                {{ __('present') }}
                            @endif
                        </div>
                    </div>

                @empty
                    {{ __('No charges for this device yet.') }}
                @endforelse
            </x-slot>
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 text-right">
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('isChargeHistoryModalVisible')" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-jet-secondary-button>
        </x-slot>
    </div>
</x-jet-dialog-modal>
