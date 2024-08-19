<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('dossier', $user) }}
    @endsection

    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 ">

            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <div class="bg-white p-3 border-t-4 border-indigo-400 rounded-md">
                    <div class="image overflow-hidden">
                        <img class="h-auto w-full mx-auto object-cover"
                             src="{{ $user->profile_photo_url }}"
                             alt="{{ $user->name }}">
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{ $user->name }}</h1>
                    <h3 class="text-gray-600 font-lg text-semibold leading-6">{{ $user->position }}</h3>
                    <ul
                        class="bg-gray-50 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>{{ __('Status') }}</span>
                            <span class="ml-auto bg-green-500 py-1 px-2 rounded text-white text-sm">
                                {{ __('Active') }}
                            </span>
                        </li>
                        <li class="flex items-center py-3">
                            <span>{{ __('Employee since') }}</span>
                            @if($user->personalInformation)
                                <span class="ml-auto py-1 px-2 text-sm"> {{ \Carbon\Carbon::parse($user->personalInformation->employment_date)->format('d/m/Y') }}</span>
                            @else
                                <span class="ml-auto py-1 px-2 text-sm">{{ __('N/A') }}</span>
                            @endif
                        </li>
                    </ul>
                </div>

                <div class="my-4"></div>

                <div class="bg-white p-3 hover:shadow rounded-md">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 text-xl leading-8">
                        <span class="text-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 text-indigo-500">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </span>
                        <span>{{ __('Other Dossiers') }}</span>
                    </div>
                    <div class="grid grid-cols-3 mt-5">
                        @foreach($employees as $employee)
                            <a href="{{ route('users.show', $employee->id) }}" class="text-main-color">
                                <div class="text-center my-2">
                                    <img class="h-16 w-16 rounded-full mx-auto object-cover" src="{{ $employee->profile_photo_url }}" alt="{{ $employee->name }}">
                                    <span>{{ \Illuminate\Support\Str::words($employee->name, 1, '') }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2">
                @livewire('dossier.update-account-information-form', ['user' => $user])
                <div class="my-4"></div>

                @livewire('dossier.update-personal-information-form', ['user' => $user])
                <div class="my-4"></div>

                <div class="bg-white w-full rounded-md shadow">
                    <div class="col-span-6 sm:col-span-6 px-5 py-3">
                        <x-jet-label for="employment_type" value="{{ __('Signature') }}" />
                        <div class="flex mt-1">
                            <div class="wrapper w-full bg-gray-50 rounded sm mb-3">
                                @if($user->signature_photo_path !== null)
                                    <img src="{{ url('storage/' . $user->signature_photo_path) }}" class="rounded-md" alt="teambuilding">
                                @else
                                    <div class="p-5 bg-pink-50 text-pink-500">
                                        {{ __('Employee has got no signature yet!') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-4"></div>

                @livewire('dossier.update-skills-form', ['user' => $user])
                <div class="my-4"></div>

                @livewire('dossier.update-meta-program-form', ['user' => $user])
                <div class="my-4"></div>
            </div>
        </div>
    </div>
</x-app-layout>
