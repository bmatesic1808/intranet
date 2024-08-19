<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('profile') }}
    @endsection

    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2">

            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <div class="bg-white p-3 border-t-4 border-indigo-400 rounded-md">
                    <div class="image overflow-hidden">
                        <img class="h-auto w-full mx-auto"
                             src="{{ $user->profile_photo_url }}"
                             alt="{{ $user->name }}">
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{ $user->name }}</h1>
                    <h3 class="text-gray-600 font-lg text-semibold leading-6">{{ $user->position }}</h3>
                    <ul class="bg-gray-50 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>{{ __('Status') }}</span>
                            <span class="ml-auto bg-green-500 py-1 px-2 rounded text-white text-sm">
                                {{ __('Active') }}
                            </span>
                        </li>
                        <li class="flex items-center py-3">
                            <span>{{ __('Employee since') }}</span>
                            <span class="ml-auto py-1 px-2 text-sm">
                               @if($user->personalInformation)
                                    {{ \Carbon\Carbon::parse($user->personalInformation->employment_date)->format('d/m/Y') }}
                                @else
                                    {{ __('N/A') }}
                                @endif
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2">
                @livewire('profile.update-profile-information-form')
                <div class="my-4"></div>

                @livewire('dossier.update-personal-information-form', ['user' => auth()->user()])
                <div class="my-4"></div>

                @livewire('profile.signature')
                <div class="my-4"></div>

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    @livewire('profile.update-password-form')
                    <div class="my-4"></div>
                @endif

                @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                    @livewire('profile.two-factor-authentication-form')
                    <div class="my-4"></div>
                @endif

                @livewire('profile.logout-other-browser-sessions-form')
                <div class="my-4"></div>

                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                    @can('delete_users')
                        @livewire('profile.delete-user-form')
                    @endcan
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
