<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('activities') }}
    @endsection

    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Causer') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Activity') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Time') }}
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($activities->sortByDesc('created_at') as $activity)
                                    @if($activity->causer)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <img class="h-10 w-10 rounded-full"
                                                             src="{{ $activity->causer['profile_photo_url'] }}"
                                                             alt="{{ $activity->causer['name'] }}">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{  $activity->causer['name'] }}
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            {{ $activity->causer['email'] }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ ucfirst($activity->description) }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-gray-400">
                                                <div class="flex flex-col">
                                                    <div class="text-sm">
                                                      {{ $activity->created_at->format('d/m/Y') }}
                                                    </div>
                                                    <div class="text-xs">
                                                      {{ $activity->created_at->format('H:i:s') }}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3">
            {{ $activities->links() }}
        </div>
    </div>
</x-app-layout>
