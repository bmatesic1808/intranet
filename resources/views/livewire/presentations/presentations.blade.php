<div>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-between">
            <x-jet-input id="searchTerm" type="text" wire:model="searchTerm" placeholder="Search..." />
            <x-jet-button wire:click="showCreateModal" class="font-bold">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-2">
                    <path fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                          clip-rule="evenodd"/>
                </svg>
                {{ __('Add Presentation') }}
            </x-jet-button>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                {{ __('Type') }}
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                {{ __('Title') }}
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                {{ __('Rating') }}
                                            </th>

                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                {{ __('Date') }}
                                            </th>

                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                {{ __('VOTE') }}
                                            </th>

                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @if($presentations->isNotEmpty())
                                            @foreach($presentations as $presentation)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="uppercase py-1 px-2 font-bold">
                                                            @if($presentation->company === 1)
                                                                {{ __('Company') }}
                                                            @else
                                                                {{ __('Team') }}
                                                            @endif
                                                        </span>
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-blue-600 hover:text-blue-900 font-bold">
                                                            <a href="{{ $presentation->url }}" target="_blank">
                                                                <div class="has-tooltip">
                                                                    <span style="white-space: break-spaces;" class="w-1/2 block break-words tooltip rounded shadow-lg p-4 bg-gray-100 text-gray-700 -mt-16 ml-16">{{ $presentation->comments }}</span>
                                                                    {{ $presentation->title }}
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                                        <div class="text-gray-900">
                                                            <div class="flex space-x-1 rating">
                                                                <label for="star1">
                                                                    <input class="hidden" type="radio" id="star1" value="1" />
                                                                    <svg class="cursor-pointer block w-5 h-5 @if($presentation->ratings->avg('rating') >= 1) text-yellow-500 @else text-gray-400 @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                                </label>
                                                                <label for="star2">
                                                                    <input class="hidden" type="radio" id="star2" value="2" />
                                                                    <svg class="cursor-pointer block w-5 h-5 @if($presentation->ratings->avg('rating') >= 2) text-yellow-500 @else text-gray-400 @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                                </label>
                                                                <label for="star3">
                                                                    <input class="hidden" type="radio" id="star3" value="3" />
                                                                    <svg class="cursor-pointer block w-5 h-5 @if($presentation->ratings->avg('rating') >= 3) text-yellow-500 @else text-gray-400 @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                                </label>
                                                                <label for="star4">
                                                                    <input class="hidden" type="radio" id="star4" value="4" />
                                                                    <svg class="cursor-pointer block w-5 h-5 @if($presentation->ratings->avg('rating') >= 4) text-yellow-500 @else text-gray-400 @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                                </label>
                                                                <label for="star5">
                                                                    <input class="hidden" type="radio" id="star5" value="5" />
                                                                    <svg class="cursor-pointer block w-5 h-5 @if($presentation->ratings->avg('rating') >= 5) text-yellow-500 @else text-gray-400 @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                                        <div class="text-gray-900">
                                                            {{ $presentation->created_at->format('d/m/Y') }}
                                                        </div>
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                                        @if(!\App\Models\PresentationRating::where('presentation_id', $presentation->id)->where('user_id', auth()->id())->exists())
                                                            <div class="block max-w-3xl px-1 py-2 mx-auto">
                                                                <div class="flex space-x-1 rating justify-center">
                                                                    <select wire:model="score" class="mt-1 mr-2 block rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                                        <option value="1" selected>{{ __('1') }}</option>
                                                                        <option value="2">{{ __('2') }}</option>
                                                                        <option value="3">{{ __('3') }}</option>
                                                                        <option value="4">{{ __('4') }}</option>
                                                                        <option value="5">{{ __('5') }}</option>
                                                                    </select>

                                                                    <x-jet-button wire:loading.attr="disabled" wire:click="rate({{ $presentation->id }})" class="rounded-full px-5">
                                                                        {{ __('Rate') }}
                                                                    </x-jet-button>
                                                                </div>

                                                                <div class="flex items-center pt-1">
                                                                    <x-jet-action-message class="ml-1" on="saved">
                                                                        {{ __('Saved.') }}
                                                                    </x-jet-action-message>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="block max-w-3xl px-1 py-2 mx-auto">
                                                                <div class="flex space-x-1 rating justify-center text-green-500 bg-green-50 py-2 rounded-full font-semibold">
                                                                    {{ __('Rated') }}
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                                        @include('livewire.presentations.partials._presentation-dropdown-actions')
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('livewire.presentations.partials._presentation-create')
    @include('livewire.presentations.partials._presentation-edit')
    @include('livewire.presentations.partials._presentation-delete')
</div>
