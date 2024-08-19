<div>
    <div class="bg-white rounded-md">
        @can('read_activity')
            <div class="pt-2">
                <form wire:submit.prevent="addNewGoalItem">
                    <div class="flex justify-between">
                        <select wire:model="category_id" class="mr-2 block rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option selected>{{ __('Category') }}</option>
                            <option value="1">{{ __('Godišnji prihod') }}</option>
                            <option value="2">{{ __('Sales ciljevi') }}</option>
                            <option value="3">{{ __('In-house') }}</option>
                        </select>

                        <select wire:model="year" class="mr-2 block rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option selected>{{ __('Year') }}</option>
                            <option value="2021">{{ __('2021') }}</option>
                            <option value="2022">{{ __('2022') }}</option>
                            <option value="2023">{{ __('2023') }}</option>
                            <option value="2024">{{ __('2024') }}</option>
                            <option value="2025">{{ __('2025') }}</option>
                        </select>

                        <x-jet-input type="text" class="w-5/6 mr-2" wire:model.defer="item" placeholder="Goal..."></x-jet-input>

                        <x-jet-button wire:loading.attr="disabled" wire:click="$refresh">
                            {{ __('Add') }}
                        </x-jet-button>
                    </div>

                    <div class="flex justify-end items-center">
                        <x-jet-action-message class="mt-1" on="saved">
                            {{ __('Saved.') }}
                        </x-jet-action-message>
                    </div>
                </form>
            </div>
        @endcan

        @if($goals->isNotEmpty())
            <div class="mt-7">
                <div class="grid grid-cols-2 gap-10">
                    @foreach($goalsYear as $goalYear)
                        <div>
                            <div class="bg-indigo-100 text-indigo-700 mb-2 rounded flex items-center px-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg>
                                <h1 class="py-3 px-2 font-semibold">{{ $goalYear . '.' }}</h1>
                            </div>

                            <div class="pb-5">
                                <h1 class="font-semibold text-gray-700 bg-gray-100 rounded px-2 py-1 mb-2">{{ __('GODIŠNJI PRIHOD') }}</h1>
                                @foreach($goals as $goal)
                                    @if($goal->category_id === 1 && $goal->year === $goalYear)
                                        <div class="flex items-center justify-between py-1">
                                            <div class="flex items-center px-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <p class="text-gray-700 font-semibold">
                                                    {{ $goal->item }}
                                                </p>
                                            </div>

                                            @can('read_activity')
                                                <div>
                                                    <div class="ml-2" wire:click="deleteGoalsItem({{ $goal->id }})" wire:loading.attr="disabled">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-500 cursor-pointer hover:text-pink-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            @endcan
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <div class="pb-5">
                                <h1 class="font-semibold text-gray-700 bg-gray-100 rounded px-2 py-1 mb-2">{{ __('SALES CILJEVI') }}</h1>
                                @foreach($goals as $goal)
                                    @if($goal->category_id === 2 && $goal->year === $goalYear)
                                        <div class="flex items-center justify-between py-1">
                                            <div class="flex items-center px-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <p class="text-gray-700 font-semibold">
                                                    {{ $goal->item }}
                                                </p>
                                            </div>

                                            @can('read_activity')
                                                <div>
                                                    <div class="ml-2" wire:click="deleteGoalsItem({{ $goal->id }})" wire:loading.attr="disabled">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-500 cursor-pointer hover:text-pink-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            @endcan
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <div class="pb-5">
                                <h1 class="font-semibold text-gray-700 bg-gray-100 rounded px-2 py-1 mb-2">{{ __('IN-HOUSE') }}</h1>
                                @foreach($goals as $goal)
                                    @if($goal->category_id === 3 && $goal->year === $goalYear)
                                        <div class="flex items-center justify-between py-1">
                                            <div class="flex items-center px-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <p class="text-gray-700 font-semibold">
                                                    {{ $goal->item }}
                                                </p>
                                            </div>

                                            @can('read_activity')
                                                <div>
                                                    <div class="ml-2" wire:click="deleteGoalsItem({{ $goal->id }})" wire:loading.attr="disabled">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-500 cursor-pointer hover:text-pink-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            @endcan
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
