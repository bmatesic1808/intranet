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
                                {{ __('Name / Email') }}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ __('Function') }}
                            </th>
{{--                            <th scope="col"--}}
{{--                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                                {{ __('Access role') }}--}}
{{--                            </th>--}}
                            @can('see_user_actions')
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Points / ') }}{{ today()->monthName }}
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-right">
                                </th>
                            @endcan
                        </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @if($users->isNotEmpty())
                                @if(auth()->user()->currentTeam->personal_team === true)
                                    @foreach($users as $user)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <img class="h-10 w-10 rounded-full object-cover"
                                                             src="{{ $user->profile_photo_url }}"
                                                             alt="{{ $user->name }}">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $user->name }}
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            {{ $user->email }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $user->position }}</div>
                                                {{-- <div class="text-sm text-gray-500">
                                                    @foreach($user->teams as $team)
                                                        {{ $team->name }}
                                                    @endforeach
                                                </div> --}}
                                            </td>

{{--                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">--}}
{{--                                                @foreach($user->getRoleNames() as $role)--}}
{{--                                                    <span class="capitalize px-4 py-0.5 inline-flex text-sm font-semibold rounded-full bg-indigo-50 text-indigo-500">--}}
{{--                                                        {{ $role }}--}}
{{--                                                    </span>--}}
{{--                                                @endforeach--}}
{{--                                            </td>--}}

                                            @can('see_user_actions')
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                    <span class="capitalize px-4 py-0.5 inline-flex text-sm font-semibold rounded-full bg-indigo-50 text-indigo-500">
                                                        @foreach($user->points as $point)
                                                            @if((int)$point->date->format('m') === today()->month && (int)$point->date->format('Y') === today()->year)
                                                                {{ $point->points }}
                                                            @endif
                                                        @endforeach
                                                    </span>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                                    @include('livewire.users.partials._dropdown-actions')
                                                </td>
                                            @endcan
                                        </tr>
                                    @endforeach
                                @endif

                                @if(auth()->user()->currentTeam->personal_team === false)
                                    @foreach($users as $user)
                                        @if($user->belongsToTeam(auth()->user()->currentTeam))
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10">
                                                            <img class="h-10 w-10 rounded-full"
                                                                 src="{{ $user->profile_photo_url }}"
                                                                 alt="{{ $user->name }}">
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ $user->name }}
                                                            </div>
                                                            <div class="text-sm text-gray-500">
                                                                {{ $user->email }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{ $user->position }}</div>
                                                    <div class="text-sm text-gray-500">
                                                        @foreach($user->teams as $team)
                                                            {{ $team->name }}
                                                        @endforeach
                                                    </div>
                                                </td>

                                                @can('see_user_actions')
                                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                        <span class="capitalize px-4 py-0.5 inline-flex text-sm font-semibold rounded-full bg-indigo-50 text-indigo-500">
                                                            @foreach($user->points as $point)
                                                                @if((int)$point->date->format('m') === today()->month)
                                                                    @if($loop->last)
                                                                        {{ $point->points }}
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        </span>
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                                        @include('livewire.users.partials._dropdown-actions')
                                                    </td>
                                                @endcan
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
