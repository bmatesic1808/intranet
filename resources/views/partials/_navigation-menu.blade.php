<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <x-jet-application-mark class="block h-9 w-auto" />
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:flex ml-5">
                    <x-jet-nav-link href="{{ route('overview.index') }}" :active="request()->routeIs('overview.index')" class="uppercase">
                        {{ __('Overview') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ route('users.index') }}" class="uppercase"
                        :active="request()->routeIs('users.index')
                        || request()->routeIs('users.show')
                        || request()->routeIs('meetings.show')
                        || request()->routeIs('performance.reviews.show')
                    ">
                        {{ __('Employees') }}
                    </x-jet-nav-link>

                    <div class="hidden sm:flex sm:items-center">
                        <div class="relative">
                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border uppercase border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                            {{ __('Absence') }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                        </button>
                                    </span>
                                </x-slot>

                                <x-slot name="content">
                                    <x-jet-dropdown-link href="{{ route('absence.index') }}" :active="request()->routeIs('absence.index') || request()->routeIs('absence.show')">
                                        {{ __('My Absence') }}
                                    </x-jet-dropdown-link>
                                    <div class="border-t border-gray-100"></div>

                                    <x-jet-dropdown-link href="{{ route('absence.company.overview') }}">
                                        {{ __('Company Overview') }}
                                    </x-jet-dropdown-link>
                                </x-slot>
                            </x-jet-dropdown>
                        </div>
                    </div>

                    <x-jet-nav-link href="{{ route('sick-leave.index') }}" :active="request()->routeIs('sick-leave.index')" class="uppercase">
                        {{ __('Sick Leave') }}
                    </x-jet-nav-link>

                    {{-- <x-jet-nav-link href="{{ route('equipment.index') }}" :active="request()->routeIs('equipment.index')" class="uppercase">
                        {{ __('Equipment') }}
                    </x-jet-nav-link> --}}

                    <div class="hidden sm:flex sm:items-center">
                        <div class="relative">
                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border uppercase border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                            {{ __('Company') }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                        </button>
                                    </span>
                                </x-slot>

                                <x-slot name="content">
                                    {{-- <x-jet-dropdown-link href="{{ route('company.index') }}">
                                        {{ __('Dashboard') }}
                                    </x-jet-dropdown-link>
                                    <div class="border-t border-gray-100"></div>

                                    <x-jet-dropdown-link href="{{ route('presentations.index') }}">
                                        {{ __('Presentations') }}
                                    </x-jet-dropdown-link>
                                    <div class="border-t border-gray-100"></div> --}}

                                    <x-jet-dropdown-link href="{{ route('teambuilding.index') }}">
                                        {{ __('Teambuilding') }}
                                    </x-jet-dropdown-link>
                                    <div class="border-t border-gray-100"></div>

                                    @unlessrole('admin')
                                        <x-jet-dropdown-link href="{{ route('monthly.create') }}">
                                            {{ __('Monthly Questionaire') }}
                                        </x-jet-dropdown-link>

                                        <div class="border-t border-gray-100"></div>

                                        <x-jet-dropdown-link href="{{ route('ceo.create') }}">
                                            {{ __('CEO Questionaire') }}
                                        </x-jet-dropdown-link>
                                    @endunlessrole

                                    <!-- only admin can see CEO questionaire list -->
                                    @can('do_performance_review_actions')
                                        <div class="border-t border-gray-100"></div>

                                        <x-jet-dropdown-link href="{{ route('ceo.index') }}">
                                            {{ __('CEO Questionaire Analytics') }}
                                        </x-jet-dropdown-link>

                                        <div class="border-t border-gray-100"></div>

                                        <x-jet-dropdown-link href="{{ route('monthly.analytics') }}">
                                            {{ __('Monthly Questionaire Analytics') }}
                                        </x-jet-dropdown-link>
                                    @endcan
                                </x-slot>
                            </x-jet-dropdown>
                        </div>
                    </div>

                    <x-jet-nav-link href="{{ route('sop.index') }}"
                                    :active="request()->routeIs('sop.index')
                                    || request()->routeIs('sop.create')
                                    || request()->routeIs('sop.edit')
                                    || request()->routeIs('sop.show')"
                                    class="uppercase">
                        {{ __('SOP') }}
                    </x-jet-nav-link>

{{--                    @can('read_activity')--}}
{{--                        <x-jet-nav-link href="{{ route('activities.index') }}" :active="request()->routeIs('activities.index')" class="uppercase">--}}
{{--                            {{ __('Activity') }}--}}
{{--                        </x-jet-nav-link>--}}
{{--                    @endcan--}}
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    @can('manage_team')
                                        <!-- Team Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage Team') }}
                                        </div>

                                        <!-- Team Settings -->
                                        <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                            {{ __('Team Settings') }}
                                        </x-jet-dropdown-link>

                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-jet-dropdown-link>

                                        <div class="border-t border-gray-100"></div>
                                    @endcan

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (auth()->user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Logout') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('overview.index') }}" :active="request()->routeIs('overview.index')" class="uppercase">
                {{ __('Overview') }}
            </x-jet-responsive-nav-link>
            @can('create_users')
                <x-jet-responsive-nav-link href="{{ route('users.index') }}" class="uppercase"
                                :active="request()->routeIs('users.index')
                            || request()->routeIs('users.show')
                            || request()->routeIs('meetings.show')
                            || request()->routeIs('performance.reviews.show')
                        ">
                    {{ __('Employees') }}
                </x-jet-responsive-nav-link>
            @endcan

            <x-jet-responsive-nav-link href="{{ route('absence.index') }}" :active="request()->routeIs('absence.index') || request()->routeIs('absence.show')" class="uppercase">
                {{ __('Absence') }}
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{ route('sick-leave.index') }}" :active="request()->routeIs('sick-leave.index') || request()->routeIs('sick-leave.show')" class="uppercase">
                {{ __('Sick Leave') }}
            </x-jet-responsive-nav-link>

            {{-- <x-jet-responsive-nav-link href="{{ route('equipment.index') }}" :active="request()->routeIs('equipment.index')" class="uppercase">
                {{ __('Equipment') }}
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{ route('company.index') }}" :active="request()->routeIs('company.index')" class="uppercase">
                {{ __('Company') }}
            </x-jet-responsive-nav-link> --}}

            <x-jet-responsive-nav-link href="{{ route('sop.index') }}"
                            :active="request()->routeIs('sop.index')
                                    || request()->routeIs('sop.create')
                                    || request()->routeIs('sop.edit')
                                    || request()->routeIs('sop.show')"
                            class="uppercase">
                {{ __('SOP') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="flex-shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profiles') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    @can('manage_team')
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Team') }}
                        </div>

                        <!-- Team Settings -->
                        <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                            {{ __('Team Settings') }}
                        </x-jet-responsive-nav-link>

                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-jet-responsive-nav-link>

                        <div class="border-t border-gray-200"></div>
                    @endcan

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>
