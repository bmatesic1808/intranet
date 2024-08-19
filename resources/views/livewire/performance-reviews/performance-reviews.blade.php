<div>
    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-jet-form-section submit="addNewPerformanceReview" class="py-6">
            <x-slot name="title">
                {{ $this->user->name }}
            </x-slot>

            <x-slot name="description">
                {{ __('Review and create individual performance reviews. Average rating and graphs are automatically generated.') }}
            </x-slot>

            <x-slot name="form">
                <!-- Comment -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="comment" value="{{ __('Comment') }}" />
                    <textarea wire:model.defer="comment" id="comment" class="mt-1 block w-full border-gray-300 rounded-md" rows="7"></textarea>
                    <x-jet-input-error for="comment" class="mt-2" />
                </div>

                <!-- Rating -->
                <div class="col-span-6 sm:col-span-2">
                    <div>
                        <x-jet-label for="rating" value="{{ __('Rating') }}" />
                        <x-jet-input id="rating" type="number" min="0" max="10" class="mt-1 block w-full" wire:model.defer="rating" autocomplete="rating" />
                        <x-jet-input-error for="rating" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="rating" value="{{ __('Date') }}" />
                        <x-jet-input id="rating" type="date" class="mt-1 block w-full" wire:model.defer="date" />
                        <x-jet-input-error for="date" class="mt-2" />
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

        @if(count($this->reviews))
            <section class="text-gray-600 body-font">
                <div class="container py-6 mx-auto">
                    <div class="flex flex-wrap -mx-4 -mb-10 text-center">
                        <div class="sm:w-1/2 mb-10 px-4 w-full">
                            <div class="bg-white flex justify-center max-w-7xl mx-auto sm:px-6 lg:px-6 px-2 rounded-md shadow py-4 mb-1.5 font-normal text-gray-700">
                                {{ __('Average performance rating') }}
                                <span class="bg-blue-100 text-blue-600 rounded-lg font-bold ml-2 px-2">{{ $averageRating }}</span>
                            </div>
                            <div class="bg-white flex justify-center max-w-7xl mx-auto sm:px-6 lg:px-6 px-2 rounded-md shadow py-6">
                                <div class="h-80 w-full bg-blue-50 rounded-md">
                                    <livewire:livewire-line-chart
                                        key="{{ $lineChartModel->reactiveKey() }}"
                                        :line-chart-model="$lineChartModel"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="sm:w-1/2 mb-10 px-4 w-full">
                            <div class="bg-white border border-gray-200 rounded-md" x-data="{selected:null}">
                                <ul class="shadow-box">
                                    @foreach($this->reviews->sortByDesc('created_at') as $index => $review)
                                        <li class="relative border-b border-gray-200">
                                            <button type="button" class="w-full px-8 py-4 text-left text-sm" @click="selected !== {{ $index }} ? selected = {{ $index }} : selected = null">
                                                <div class="flex items-center justify-between">
                                                    <span class="bg-green-50 font-semibold text-green-500 text-sm px-2 py-1 rounded-lg">
                                                        {{ $review->rating }} {{ __('/ 10') }}
                                                    </span>
                                                    <span class="text-gray-500">
                                                        {{ $review->date->format('d. m. Y.') }}
                                                    </span>
                                                    <span class="h-5 w-5 text-gray-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </button>

                                            <div class="relative overflow-hidden transition-all max-h-0 duration-700" style=""
                                                 x-ref="container{{ $index }}"
                                                 x-bind:style="selected == {{ $index }} ? 'max-height: ' + $refs.container{{ $index }}.scrollHeight + 'px' : ''">
                                                <div class="p-6 text-left">
                                                    <p>{{ $review->comment }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </div>
</div>
