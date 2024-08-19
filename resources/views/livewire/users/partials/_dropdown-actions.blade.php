<div class="hidden sm:flex sm:items-center sm:ml-6">
    <div class="ml-3 absolute">
        <x-jet-dropdown align="right" width="60">
            <x-slot name="trigger">
                <span class="inline-flex rounded-md">
                    <button type="button" class="inline-flex items-center p-2 border border-transparent text-sm leading-4 font-medium rounded-full text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                        <svg class="h-4 w-4"
                             xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </button>
                </span>
            </x-slot>

            <x-slot name="content">
                <div class="w-52 z-50">
                    <x-jet-dropdown-link href="{{ route('users.show', $user->id) }}" class="cursor-pointer">
                        {{ __('View dossier') }}
                    </x-jet-dropdown-link>
                    <hr>

                    <x-jet-dropdown-link href="{{ route('monthly.index', $user->id) }}" class="cursor-pointer">
                        {{ __('Monthly Questionaires') }}
                    </x-jet-dropdown-link>

                    @can('do_performance_review_actions')
                        <x-jet-dropdown-link href="{{ route('performance.reviews.show', $user->id) }}" class="cursor-pointer">
                            {{ __('Performance reviews') }}
                        </x-jet-dropdown-link>
                        <hr>
                    @endcan

                    @can('do_meeting_actions')
                        <x-jet-dropdown-link href="{{ route('meetings.show', $user->id) }}" class="cursor-pointer">
                            {{ __('1 on 1 Meetings') }}
                        </x-jet-dropdown-link>
                        <hr>
                    @endcan

                    @can('read_activity')
                        <x-jet-dropdown-link href="{{ route('user.points', $user->id) }}" class="cursor-pointer">
                            {{ __('In-App Activity Points') }}
                        </x-jet-dropdown-link>
                        <hr>
                    @endcan

                    {{-- <x-jet-dropdown-link href="{{ route('equipment.show', $user->id) }}" class="cursor-pointer">
                        {{ __('Equipment') }}
                    </x-jet-dropdown-link>
                    <hr class="border-2"> --}}

                    <x-jet-dropdown-link wire:click="showFreeDaysModal({{ $user->id }})" class="cursor-pointer">
                        {{ __('Vacation days / year') }}
                    </x-jet-dropdown-link>
                    <hr>

                    <x-jet-dropdown-link wire:click="showOvertimeWorkModal({{ $user->id }})" class="cursor-pointer">
                        {{ __('Overtime work') }}
                    </x-jet-dropdown-link>
                    <hr>

                    <x-jet-dropdown-link href="{{ route('absence.show', $user->id) }}" class="cursor-pointer">
                        {{ __('Absence') }}
                    </x-jet-dropdown-link>
                    <hr>

                    <x-jet-dropdown-link href="{{ route('sick-leave.show', $user->id) }}" class="cursor-pointer">
                        {{ __('Sick Leave') }}
                    </x-jet-dropdown-link>
                    <hr>

                    <hr class="border-2">
                    <!--
                    <x-jet-dropdown-link href="#" class="cursor-pointer flex">
                        <svg class="h-4 w-4 mr-2" viewBox="0 0 256 229" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <path d="M19.3542 196.034L30.6442 215.535C32.99 219.64 36.3622 222.866 40.3211 225.212C51.6602 210.818 59.5534 199.773 64.0006 192.075C68.5137 184.264 74.061 172.045 80.6424 155.42C62.9064 153.085 49.466 151.918 40.3211 151.918C31.5455 151.918 18.1051 153.085 0 155.42C0 159.965 1.17299 164.51 3.51893 168.616L19.3542 196.034Z" fill="#0066DA"/>
                                <path d="M215.681 225.212C219.64 222.866 223.013 219.64 225.358 215.535L230.05 207.471L252.484 168.616C254.829 164.51 256.002 159.965 256.002 155.42C237.793 153.085 224.377 151.918 215.755 151.918C206.489 151.918 193.073 153.085 175.507 155.42C182.01 172.136 187.484 184.355 191.929 192.075C196.412 199.864 204.33 210.909 215.681 225.212Z" fill="#EA4335"/>
                                <path d="M128.001 73.3111C141.121 57.4655 150.163 45.247 155.126 36.6556C159.123 29.7376 163.522 18.6921 168.322 3.51893C164.363 1.17296 159.818 0 155.126 0H100.876C96.1841 0 91.6388 1.31959 87.68 3.51893C93.7862 20.921 98.9675 33.3058 103.224 40.6733C107.928 48.8152 116.187 59.6945 128.001 73.3111Z" fill="#00832D"/>
                                <path d="M175.36 155.42H80.6421L40.3211 225.212C44.28 227.558 48.8252 228.731 53.5172 228.731H202.485C207.177 228.731 211.723 227.411 215.681 225.212L175.36 155.42Z" fill="#2684FC"/>
                                <path d="M128.001 73.3111L87.6803 3.51892C83.7214 5.86487 80.3489 9.09043 78.003 13.1961L3.51893 142.224C1.17299 146.329 0 150.874 0 155.42H80.6424L128.001 73.3111Z" fill="#00AC47"/>
                                <path d="M215.242 77.71L177.999 13.1961C175.654 9.09043 172.281 5.86487 168.322 3.51892L128.001 73.3111L175.36 155.42H255.856C255.856 150.874 254.683 146.329 252.337 142.224L215.242 77.71Z" fill="#FFBA00"/>
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="256" height="229" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <span>{{ __('Create Drive') }}</span>
                    </x-jet-dropdown-link>
                    <hr>

                    <x-jet-dropdown-link href="#" class="cursor-pointer flex">
                        <svg class="h-4 w-4 mr-2" viewBox="0 0 256 256"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid">
                            <g>
                                <path d="M53.8412698,161.320635 C53.8412698,176.152381 41.8539683,188.139683 27.0222222,188.139683 C12.1904762,188.139683 0.203174603,176.152381 0.203174603,161.320635 C0.203174603,146.488889 12.1904762,134.501587 27.0222222,134.501587 L53.8412698,134.501587 L53.8412698,161.320635 Z M67.2507937,161.320635 C67.2507937,146.488889 79.2380952,134.501587 94.0698413,134.501587 C108.901587,134.501587 120.888889,146.488889 120.888889,161.320635 L120.888889,228.368254 C120.888889,243.2 108.901587,255.187302 94.0698413,255.187302 C79.2380952,255.187302 67.2507937,243.2 67.2507937,228.368254 L67.2507937,161.320635 Z" fill="#E01E5A"></path>
                                <path d="M94.0698413,53.6380952 C79.2380952,53.6380952 67.2507937,41.6507937 67.2507937,26.8190476 C67.2507937,11.9873016 79.2380952,-7.10542736e-15 94.0698413,-7.10542736e-15 C108.901587,-7.10542736e-15 120.888889,11.9873016 120.888889,26.8190476 L120.888889,53.6380952 L94.0698413,53.6380952 Z M94.0698413,67.2507937 C108.901587,67.2507937 120.888889,79.2380952 120.888889,94.0698413 C120.888889,108.901587 108.901587,120.888889 94.0698413,120.888889 L26.8190476,120.888889 C11.9873016,120.888889 0,108.901587 0,94.0698413 C0,79.2380952 11.9873016,67.2507937 26.8190476,67.2507937 L94.0698413,67.2507937 Z" fill="#36C5F0"></path>
                                <path d="M201.549206,94.0698413 C201.549206,79.2380952 213.536508,67.2507937 228.368254,67.2507937 C243.2,67.2507937 255.187302,79.2380952 255.187302,94.0698413 C255.187302,108.901587 243.2,120.888889 228.368254,120.888889 L201.549206,120.888889 L201.549206,94.0698413 Z M188.139683,94.0698413 C188.139683,108.901587 176.152381,120.888889 161.320635,120.888889 C146.488889,120.888889 134.501587,108.901587 134.501587,94.0698413 L134.501587,26.8190476 C134.501587,11.9873016 146.488889,-1.42108547e-14 161.320635,-1.42108547e-14 C176.152381,-1.42108547e-14 188.139683,11.9873016 188.139683,26.8190476 L188.139683,94.0698413 Z" fill="#2EB67D"></path>
                                <path d="M161.320635,201.549206 C176.152381,201.549206 188.139683,213.536508 188.139683,228.368254 C188.139683,243.2 176.152381,255.187302 161.320635,255.187302 C146.488889,255.187302 134.501587,243.2 134.501587,228.368254 L134.501587,201.549206 L161.320635,201.549206 Z M161.320635,188.139683 C146.488889,188.139683 134.501587,176.152381 134.501587,161.320635 C134.501587,146.488889 146.488889,134.501587 161.320635,134.501587 L228.571429,134.501587 C243.403175,134.501587 255.390476,146.488889 255.390476,161.320635 C255.390476,176.152381 243.403175,188.139683 228.571429,188.139683 L161.320635,188.139683 Z" fill="#ECB22E"></path>
                            </g>
                        </svg>
                        <span>{{ __('Create Slack') }}</span>
                    </x-jet-dropdown-link>
                    <hr>

                    <x-jet-dropdown-link href="#" class="cursor-pointer flex">
                        <svg class="h-4 w-4 mr-2" viewBox="0 0 130 155" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.400002 119.12L24.21 100.88C36.86 117.39 50.3 125 65.26 125C80.14 125 93.2 117.48 105.28 101.1L129.43 118.9C112 142.52 90.34 155 65.26 155C40.26 155 18.39 142.6 0.400002 119.12Z" fill="url(#paintA{{$user->id}}_linear)"/>
                            <path d="M65.18 39.84L22.8 76.36L3.21 53.64L65.27 0.160004L126.84 53.68L107.16 76.32L65.18 39.84Z" fill="url(#paintB{{$user->id}}_linear)"/>
                            <defs>
                                <linearGradient id="paintA{{$user->id}}_linear" x1="0.400002" y1="137.687" x2="129.43" y2="137.687" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#8930FD"/>
                                    <stop offset="1" stop-color="#49CCF9"/>
                                </linearGradient>
                                <linearGradient id="paintB{{$user->id}}_linear" x1="3.21" y1="51.9836" x2="126.84" y2="51.9836" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FF02F0"/>
                                    <stop offset="1" stop-color="#FFC800"/>
                                </linearGradient>
                            </defs>
                        </svg>
                        <span>{{ __('Create ClickUp') }}</span>
                    </x-jet-dropdown-link>
                    <hr class="border-2">
                    -->
                    <x-jet-dropdown-link wire:click="showEditModal({{ $user->id }})" class="cursor-pointer text-indigo-500">
                        {{ __('Quick edit') }}
                    </x-jet-dropdown-link>
                    <hr>

                    <x-jet-dropdown-link wire:click="showDestroyModal({{ $user->id }})" class="text-pink-500 cursor-pointer">
                        {{ __('Delete') }}
                    </x-jet-dropdown-link>
                </div>
            </x-slot>
        </x-jet-dropdown>
    </div>
</div>
