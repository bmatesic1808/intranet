<div>
    <div class="pb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-5">
                @foreach($users as $user)
                    <div class="w-full shadow rounded-lg  bg-white">
                        <div class="bg-white rounded-lg">
                            <div class="p-2 bg-indigo-500 text-center rounded-t-lg">
                                <p class="uppercase tracking-widest text-sm text-white font-semibold">{{ $user->name }}</p>
                            </div>
                            <div class="flex px-4 py-3 text-gray-700">
                                <div class="flex-1 inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    @if($user->charges->isNotEmpty())
                                        <p><span class="text-gray-900 font-bold">{{ $user->charges->count() }}</span>&nbsp;{{ \Illuminate\Support\Str::plural('Device', $user->charges->count()) }}</p>
                                    @else
                                        <p>{{ __('No devices charged') }}</p>
                                    @endif
                                </div>
                            </div>

                            @if($user->charges->isNotEmpty())
                                <div class="px-4 pt-3 pb-4 border-t border-gray-300 bg-white rounded-b-lg">
                                    @foreach($user->charges as $charge)
                                        <div class="flex justify-between items-center py-2 ">
                                            <div class="font-semibold uppercase bg-white">
                                                <div class="has-tooltip">
                                                    <span style="white-space: break-spaces;" class="w-1/6 block break-words tooltip rounded shadow-lg p-2 bg-gray-900 text-white -mt-10 ml-16">{{ $charge->device->inventory_number }}</span>
                                                    {{ $charge->device->item }}
                                                </div>
                                            </div>

                                            @include('livewire.equipment.partials._charge-dropdown-actions')
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
