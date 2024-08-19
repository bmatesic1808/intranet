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

        @if(!$user->hasRole(Config::get('constants.roles.ADMIN_ROLE')))
            <div class="bg-gray-50 h-12 text-center flex items-center text-gray-600 justify-center font-semibold border-b">
                {{ __("$availableFreeDays Days available (vacation)") }}
            </div>
            <div class="bg-gray-50 h-16 text-center flex flex-col items-center text-gray-600 justify-center font-semibold border-b">
                {{ __("$availableOvertimeDays Days available (overtime)") }}
                <div class="text-sm text-gray-400 font-light">
                    {{ number_format($availableOvertimeHours, 2) }}
                    {{ __("Overtime hours available") }}
                </div>
            </div>
        @endif

        <ul class="flex flex-col">
            @foreach($absences as $absence)
                <li class="flex flex-row border-b">
                    <div class="select-none cursor-pointer bg-white flex flex-1 border-l-2 border-indigo-500 items-center p-4 transition duration-500 ease-in-out transform hover:bg-gray-50">
                        <div class="flex-1 pl-1 mr-16">
                            <div class="text-gray-500 text-xs">{{ \Carbon\Carbon::parse($absence->date_from)->format('d/m/y') }} - {{ \Carbon\Carbon::parse($absence->date_to)->format('d/m/y') }}</div>
                            <a href="{{ route('absence.show', $absence->user->id) }}" class="w-full">
                                <div class="text-gray-400 text-sm font-semibold hover:text-indigo-500">{{ $absence->user->name }}</div>
                            </a>
                            <div class="text-gray-400 text-xs italic">{{ $absence->comment }}</div>
                        </div>

                        <div class="flex">
                            @if($absence->approved === NULL)
                                <div class="bg-yellow-50 text-yellow-500 rounded-full p-2 mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                </div>
                            @endif

                            @if($absence->approved === true)
                                <div class="bg-green-50 text-green-500 rounded-full p-2 mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            @endif

                            @if($absence->approved === false)
                                <div class="bg-pink-50 text-pink-500 rounded-full p-2 mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            @endif

                            @if($absence->approved === NULL || auth()->user()->hasRole([Config::get('constants.roles.ADMIN_ROLE'), Config::get('constants.roles.MANAGER_ROLE')]))
                                <div class="bg-pink-50 text-pink-500 rounded-full p-2 hover:bg-pink-100 transition cursor-pointer" wire:click.prevent="showDestroyModal({{ $absence->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <x-jet-form-section submit="createAbsence" class="col-span-2">
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-6">
                <x-jet-label for="comment" value="{{ __('Comment / Description') }}" />
                <textarea wire:model.defer="comment" id="comment" class="mt-1 block w-full border-gray-300 rounded-md" rows="3"></textarea>
                <x-jet-input-error for="comment" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-2">
                <x-jet-label for="startDate" value="{{ __('Start date') }}" />
                <input wire:model.defer="startDate" type="date" class="mt-1 block w-full border-gray-300 rounded-md">
            </div>

            <div class="col-span-6 sm:col-span-2">
                <x-jet-label for="endDate" value="{{ __('End date') }}" />
                <input wire:model.defer="endDate" type="date" class="mt-1 block w-full border-gray-300 rounded-md">
            </div>

            <div class="col-span-6 sm:col-span-2">
                <div class="bg-blue-50 p-2 rounded-lg mt-5 flex items-center">
                    <input wire:model.defer="overtimeHoursChecked" type="checkbox" class="rounded-full h-5 w-5 cursor-pointer">
                    <span class="ml-2 text-lg text-blue-500">{{ __('Use overtime hours') }}</span>
                </div>
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

    @include('livewire.absence.partials._delete')
</div>



