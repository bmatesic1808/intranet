@push('styles')
    <style>
        #absences-scroll::-webkit-scrollbar {
            width: 4px;
            cursor: pointer;
        }

        #absences-scroll::-webkit-scrollbar-track {
            background-color: rgba(229, 231, 235, var(--bg-opacity));
            cursor: pointer;
        }

        #absences-scroll::-webkit-scrollbar-thumb {
            cursor: pointer;
            background-color: #a0aec0;
        }
    </style>
@endpush

<div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="w-full overflow-auto bg-gray-50 h-75 rounded-md shadow" id="absences-scroll">

        <ul class="flex flex-col">
            @foreach($sickLeaves as $leave)
                <li class="flex flex-row border-b">
                    <div class="select-none cursor-pointer bg-white flex flex-1 border-l-8 border-indigo-500 items-center p-4 transition duration-500 ease-in-out transform hover:bg-gray-50">
                        <div class="flex-1 pl-1 mr-16">
                            <div class="text-gray-500 text-xs">{{ \Carbon\Carbon::parse($leave->date_from)->format('d/m/y') }} - {{ \Carbon\Carbon::parse($leave->date_to)->format('d/m/y') }} ({{ count($leave->sickLeaveDates) . ' days' }})</div>
                            <a href="{{ route('sick-leave.show', $leave->user->id) }}" class="w-full">
                                <div class="text-gray-400 text-sm font-semibold hover:text-indigo-500">{{ $leave->user->name }}</div>
                            </a>
                            <div class="text-gray-400 text-xs italic">{{ $leave->comment }}</div>
                        </div>

                        <div class="flex">
                            <div class="bg-pink-50 text-pink-500 rounded-full p-2 hover:bg-pink-100 transition cursor-pointer" wire:click.prevent="showDestroyModal({{ $leave->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <x-jet-form-section submit="createSickLeave" class="col-span-2">
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-6">
                <x-jet-label for="comment" value="{{ __('Comment / Description') }}" />
                <textarea wire:model.defer="comment" id="comment" class="mt-1 block w-full border-gray-300 rounded-md" rows="3"></textarea>
                <x-jet-input-error for="comment" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="startDate" value="{{ __('Start date') }}" />
                <input wire:model.defer="startDate" type="date" class="mt-1 block w-full border-gray-300 rounded-md">
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="endDate" value="{{ __('End date') }}" />
                <input wire:model.defer="endDate" type="date" class="mt-1 block w-full border-gray-300 rounded-md">
            </div>
        </x-slot>


        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:click="$refresh">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

    @include('livewire.sick-leave.partials._delete')
</div>
