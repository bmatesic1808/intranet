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
                                {{ __('Item') }}
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ __('Inventory') }}
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ __('Status') }}
                            </th>
                            @can('see_user_actions')
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-right">
                                </th>
                            @endcan
                        </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @if($devices->isNotEmpty())
                                @foreach($devices as $device)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap uppercase">
                                            <div class="has-tooltip">
                                                <span style="white-space: break-spaces;" class="w-1/6 block break-words tooltip rounded shadow-lg p-2 bg-gray-900 text-white -mt-10 ml-16">{{ $device->serial_number }}</span>
                                                {{ \Illuminate\Support\Str::limit( $device->item, 35, $end = '...') }}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <div class="text-sm text-gray-900">
                                                {{ $device->inventory_number }}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($device->charged === 0)
                                                <div class="bg-green-50 text-green-500 px-2 py-1 text-sm rounded-full text-center">
                                                    {{ __('Available') }}
                                                </div>
                                            @else
                                                <div class="bg-yellow-100 text-yellow-600 px-2 py-1 text-sm rounded-full text-center">
                                                    {{ __('Charged') }}
                                                </div>
                                            @endif
                                        </td>

                                        @can('see_user_actions')
                                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                                @include('livewire.equipment.partials._inventory-dropdown-actions')
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                    <div class="mt-5 p-5">
                        {!! $devices->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
