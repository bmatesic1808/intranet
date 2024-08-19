<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('overview') }}
    @endsection

    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">

        @if (auth()->id() === 33)
            <div class="mb-5">
                <a href="{{ route('overview.management.absence') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-800 focus:outline-none focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                    </svg>
                    
                    {{ __('Godišnji odmori') }}
                </a>

                <a href="{{ route('overview.management.sickleave') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-800 focus:outline-none focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                    </svg>
                    {{ __('Bolovanja') }}
                </a>
            </div>
        @endif
        
        <div class="grid grid-cols-3 gap-5">
            <div class="max-w-full bg-white shadow-lg rounded-lg overflow-hidden">
{{--                <img class="w-full h-32 object-cover object-center" src="{{ asset('images/bday.jpg') }}" alt="avatar">--}}
                <div class="flex items-center px-6 py-3 bg-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />
                    </svg>
                    <h1 class="mx-3 text-white font-semibold text-lg">{{ __('Birthdays this month') }}</h1>
                </div>
                <div class="py-3 px-6">
                    <div class="py-2">
                        @forelse($profiles as $profile)
                            <div class="flex items-center text-gray-700 justify-between py-2">
                                <div class="flex">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 text-indigo-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <div class="ml-2">{{ $profile->user->name }}</div>
                                </div>
                                <div class="px-2">
                                    <div>{{ date('d/m/Y', strtotime($profile->birthday)) }}</div>
                                </div>
                            </div>
                        @empty
                            <div class="text-pink-500 bg-pink-50 px-5 py-3 rounded-md">
                                {{ __('No birthdays this month.') }}
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="max-w-full bg-white shadow-lg rounded-lg overflow-hidden">
{{--                <img class="w-full h-32 object-cover object-center" src="{{ asset('images/absence.jpg') }}" alt="avatar">--}}
                <div class="flex items-center px-6 py-3 bg-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <h1 class="mx-3 text-white font-semibold text-lg">{{ __('Absent in this month') }}</h1>
                </div>
                <div class="py-3 px-6">
                    <div class="">
                        @if($absences)
                            @foreach($absences as $absence)
                                <div class="flex items-center text-gray-700 justify-between py-2">
                                    <div class="flex">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 text-indigo-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div class="ml-2">{{ $absence->user->name }}</div>
                                    </div>
                                    <div class="px-2">
                                        <div>{{ $absence->date_from->format('d/m') }} - {{ $absence->date_to->format('d/m') }}</div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-green-500 bg-green-50 p-3 rounded-lg font-semibold">
                                {{ __('No absences this month.') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="max-w-full bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="flex items-center px-6 py-3 bg-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" />
                    </svg>
                      
                    <p class="mx-3 text-white font-semibold text-lg">{{ __('Work Anniversary') }}</p>
                </div>
                <div class="py-3 px-6">
                    <div class="">
                        @forelse($workAnniversaries as $anniversary)
                            @php
                                $currentYear = new DateTime(Carbon\Carbon::now());
                                $employmentYear = new DateTime($anniversary->employment_date);
                                $diff = $employmentYear->diff($currentYear);
                            @endphp

                            @if ($diff->y !== 0)
                                <div class="flex items-center text-gray-700 justify-between py-2">
                                    <div class="flex">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 text-indigo-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <div class="ml-2">{{ $anniversary->user->name }}</div>
                                    </div>
                                    <div class="px-2">

                                        
                                        <div>
                                            {{ date('d/m/Y', strtotime($anniversary->employment_date)) }}
                                            <span class="text-white bg-green-500 rounded-full font-bold px-1.5 ml-2">{{ $diff->y }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif


                            @if ($diff->y === 0 && $diff->days > 334 && $diff->days < 365)
                                <div class="flex items-center text-gray-700 justify-between py-2">
                                    <div class="flex">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 text-indigo-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <div class="ml-2">{{ $anniversary->user->name }}</div>
                                    </div>
                                    <div class="px-2">

                                        
                                        <div>
                                            {{ date('d/m/Y', strtotime($anniversary->employment_date)) }}
                                            <span class="text-white bg-green-500 rounded-full font-bold px-1.5 ml-2">1</span>
                                        </div>
                                    </div>
                                </div>
                            @endif  
                        @empty
                            <div class="text-pink-500 bg-pink-50 px-5 py-3 rounded-md">
                                {{ __('No work anniversaries this month.') }}
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-5 mt-5">
            <div class="max-w-full bg-white shadow-lg rounded-lg overflow-hidden">
{{--                <img class="w-full h-32 object-cover object-center" src="{{ asset('images/docs.jpg') }}" alt="avatar">--}}
                <div class="flex items-center px-6 py-3 bg-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
                    </svg>
                    <h1 class="mx-3 text-white font-semibold text-lg">{{ __('Internal documents') }}</h1>
                </div>
                <div class="py-3 px-6">
                    <div class="pt-2 text-lg text-blue-500 hover:text-blue-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-indigo-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <a href="https://forms.clickup.com/1553362/f/1fcyj-187901/GZSQVV0QMP90QHJ8QM" target="_blank">Ask Ivana - forma</a>
                    </div>

                    <div class="py-1 text-lg text-blue-500 hover:text-blue-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-indigo-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <a href="https://docs.google.com/document/d/1FsW8wkZMFkF0ST5yFlJIld7AoFxStVsFGmQUwliu8P0/edit#heading=h.sf77r2hwzqeh" target="_blank">Najbitniji linkovi za Kalu (i o Kali)</a>
                    </div>

                    <div class="py-1 text-lg text-blue-500 hover:text-blue-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-indigo-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <a href="https://drive.google.com/drive/u/0/folders/1_aVBOZiR0Igc1MEfNrbKdlL06pO-cOtn" target="_blank">Pravila vezana za Kalu</a>
                    </div>

                    <div class="py-1 text-lg text-blue-500 hover:text-blue-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-indigo-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <a href="https://docs.google.com/presentation/d/1BmBXdQUWoap_PrrkZW9fgWMKXLhcGKwR3kDzJ5MHsWM/edit#slide=id.p1" target="_blank">Employee Onboarding PPT</a>
                    </div>

                    <div class="py-1 text-lg text-blue-500 hover:text-blue-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-indigo-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <a href="https://drive.google.com/drive/folders/189qIWlJeJ5SZbaiZbJ9IPjAUWSo8Udr8" target="_blank">Siguran rad i zaštita na radu</a>
                    </div>

                    <div class="py-1 text-lg text-blue-500 hover:text-blue-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-indigo-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <a href="https://docs.google.com/document/d/1eX96XAHFexpWweIrCJEWD87fAzkqRHLOdFrAH5IBSH8/edit" target="_blank">Pravilnik o radu</a>
                    </div>

                    <div class="py-1 text-lg text-blue-500 hover:text-blue-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-indigo-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <a href="https://drive.google.com/drive/folders/17GOnJJMirR42BpxqPLDHiTZQ8Ti0MklH" target="_blank">Sistematizacija</a>
                    </div>

                    <div class="py-1 text-lg text-blue-500 hover:text-blue-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-indigo-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <a href="https://docs.google.com/document/d/14bc34_nk42QeW9VwWsGhbclQtj4Xw6Sgw8KlX276iEE/edit" target="_blank">Google Drive dokumenti i imenovanje</a>
                    </div>

                    <div class="py-1 text-lg text-blue-500 hover:text-blue-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-indigo-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <a href="https://drive.google.com/drive/folders/1jhr7gfHDIEQWnTBERmxdXNW9kzdHi4vH" target="_blank">Edukacija za zaposlenike</a>
                    </div>

                    <div class="py-1 text-lg text-blue-500 hover:text-blue-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-indigo-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <a href="https://drive.google.com/drive/folders/1tH5Y-vR1vZ0PBfaCNyHS7910Y2-Sj_Zi" target="_blank">SOP-ovi</a>
                    </div>

                    <div class="py-1 text-lg text-blue-500 hover:text-blue-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-indigo-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <a href="https://docs.google.com/document/d/11j1NQG-6u4SrzbeULCqQrQA4MbMzTgvW2lwG6Taq4b0/edit" target="_blank">Lista template taskova za CU</a>
                    </div>

                    <div class="py-1 text-lg text-blue-500 hover:text-blue-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-indigo-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <a href="https://docs.google.com/spreadsheets/d/1HQaTEdaNcPCuCWWBoIAnP6kOkZ_1imW2XJVXGJTP5jA/edit#gid=0" target="_blank">Na koji mail shareati klijentov pristup</a>
                    </div>

                    <div class="py-1 text-lg text-blue-500 hover:text-blue-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-indigo-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <a href="https://docs.google.com/document/d/1u-pQqV7MUSyoKzPi1_583UUwodUSerhiqwZ4_ClB7mc/edit#heading=h.rf47bwbjtpso" target="_blank">The Roofing Document</a>
                    </div>

                    <div class="py-1 text-lg text-blue-500 hover:text-blue-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-indigo-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <a href="https://docs.google.com/document/d/1gavyvn06mm2-qKPsZlCIiK4shv_6zq0TX46VdUGcGZE/edit#heading=h.gjdgxs" target="_blank">Komunikacija s klijentima</a>
                    </div>

                    <div class="py-1 text-lg text-blue-500 hover:text-blue-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-indigo-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <a href="https://docs.google.com/document/d/1GpWDxENP5yIXyC-_uMIlUyDPfCbIn-seTWSNl7jgQ5g/edit#heading=h.gjdgxs" target="_blank">Pravila za godišnji</a>
                    </div>

                    <div class="py-1 text-lg text-blue-500 hover:text-blue-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-indigo-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <a href="https://drive.google.com/drive/folders/1beT3WPWYLjw6LDZ9VxWsgtus1u4U4j9i" target="_blank">Allianz</a>
                    </div>

                    <div class="py-1 text-lg text-blue-500 hover:text-blue-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-indigo-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <a href="https://local.profitroofingsystems.com/" target="_blank">Demo webovi - PROS</a>
                    </div>
                </div>
            </div>

            <div class="max-w-full bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="flex items-center px-6 py-3 bg-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
                        </svg>
                    <h1 class="mx-3 text-white font-semibold text-lg">{{ __('Useful Tools') }}</h1>
                </div>
                <div class="py-3 px-6">
                    <div class="pt-2 text-lg text-blue-500 hover:text-blue-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-indigo-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <a href="https://bitwarden.com/" target="_blank">Bitwarden</a>
                    </div>

                    <div class="pt-2 text-lg text-blue-500 hover:text-blue-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-indigo-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <a href="https://droplr.com/" target="_blank">Droplr</a>
                    </div>

                    <div class="pt-2 text-lg text-blue-500 hover:text-blue-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-indigo-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <a href="https://seo-extension.com/" target="_blank">SEO Meta in 1 Click</a>
                    </div>

                    <div class="pt-2 text-lg text-blue-500 hover:text-blue-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-indigo-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <a href="https://www.grammarly.com/browser/chrome" target="_blank">Grammarly for Chrome</a>
                    </div>

                    <div class="pt-2 text-lg text-blue-500 hover:text-blue-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-indigo-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <a href="https://web.archive.org/web/submit?url=&type=replay" target="_blank">Wayback Machine</a>
                    </div>

                    <div class="pt-2 text-lg text-blue-500 hover:text-blue-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-indigo-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <a href="https://valentin.app/" target="_blank">Local & International Google SERP Checker</a>
                    </div>

                    <div class="pt-2 text-lg text-blue-500 hover:text-blue-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-indigo-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <a href="https://app.supermeme.ai/login" target="_blank">Meme Generator with AI</a>
                    </div>

                    <div class="pt-2 text-lg text-blue-500 hover:text-blue-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-indigo-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <a href="https://getemoji.com/" target="_blank">GetEmoji</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10">
            <div class="w-full bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="flex items-center px-6 py-3 bg-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
                    </svg>
                    <h1 class="mx-3 text-white font-semibold text-lg">{{ __('Company goals') }}</h1>
                </div>

                <div>
                    <div class="pt-2 pb-5 px-6">
                        @livewire('goals.goals')
                    </div>
                </div>
            </div>
        </div>


        <div class="mt-10">
            <div class="w-full bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="flex items-center px-6 py-3 bg-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z" />
                      </svg>
                      
                    <h1 class="mx-3 text-white font-semibold text-lg">{{ __('Stvaranje dodatne vrijednosti') }}</h1>
                </div>

                <div>
                    <div class="pt-5 pb-5 px-6">
                        <div class="pt-4 text-lg text-gray-900 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 text-indigo-600 flex-shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>                              
                            <p>Unapređenje internih procesa ili kvalitete usluge: s ciljem postizanja veće efikasnosti, pružanja kvalitetnijih usluga i bržeg odziva.</p>
                        </div>
                        <div class="pt-4 text-lg text-gray-900 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 text-indigo-600 flex-shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>                              
                            <p>Upsell usluga: Kada su klijenti oduševljeni (ne samo zadovoljni), postoji veća mogućnost za dodatnu prodaju usluga.</p>
                        </div>
                        <div class="pt-4 text-lg text-gray-900 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 text-indigo-600 flex-shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>                              
                            <p>Premašivanje zadanih KPI-eva na razini cijelog odjela</p>
                        </div>
                        <div class="pt-4 text-lg text-gray-900 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 text-indigo-600 flex-shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>                              
                            <p>Identifikacija prilika za uštedu troškova ili vremena: Traženje načina kako smanjiti troškove ili učinkovitije koristiti vrijeme.</p>
                        </div>
                        <div class="pt-4 text-lg text-gray-900 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 text-indigo-600 flex-shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>                              
                            <p>Razvijanje novih vještina: vještine vezane uz AI chat GPT ili nove alate, stvaranje novog, dodatnog sadržaja.</p>
                        </div>
                        <div class="pt-4 text-lg text-gray-900 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 text-indigo-600 flex-shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>                              
                            <p>Premašivanje postavljenih ciljeva: Ostvarivanje rezultata koji premašuju zadane performanse (npr. umjesto 10, 20 kw u top 3; conversion rate umjesto 15% 20%; 1 upsell po klijentu u periodu od 6 mjeseci; rast followera, posjetitelja itd.)</p>
                        </div>
                        <div class="pt-4 text-lg text-gray-900 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 text-indigo-600 flex-shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>                              
                            <p>Inovacija u obliku novih procesa ili alata: Ukoliko zaposlenik dođe do inovativne ideje ili procesa koji poboljšava učinkovitost ili efikasnost usluga tvrtke unutar svog tima.</p>
                        </div>
                        <div class="pt-4 text-lg text-gray-900 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 text-indigo-600 flex-shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>                              
                            <p>Inovacija u obliku novih procesa ili alata: Ukoliko zaposlenik dođe do inovativne ideje ili procesa koji poboljšava učinkovitost ili efikasnost usluga tvrtke.</p>
                        </div>
                        <div class="pt-4 text-lg text-gray-900 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 text-indigo-600 flex-shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>                              
                            <p>Identifikacija i rješavanje problema: Ako zaposlenik prepozna potencijalne probleme unutar svog tima, ukaže na njih i preduhitri ih kroz proaktivne korake.</p>
                        </div>
                        <div class="pt-4 text-lg text-gray-900 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 text-indigo-600 flex-shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>                              
                            <p>Identifikacija i rješavanje problema: Ako zaposlenik prepozna potencijalne probleme unutar firme, ukaže na njih i preduhitri ih kroz proaktivne korake.</p>
                        </div>
                        <div class="pt-4 text-lg text-gray-900 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 text-indigo-600 flex-shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>                              
                            <p>Stvaranje visokokvalitetnog sadržaja: Kada zaposlenik stvara sadržaj visoke kvalitete koji poboljšava marketinške napore tvrtke (što se može nagraditi bonusom - kao naš TikTok, Kala podcast).</p>
                        </div>
                        <div class="pt-4 text-lg text-gray-900 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 text-indigo-600 flex-shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>                              
                            <p>Generiranje pozitivnog publiciteta: Kroz vanjske prezentacije, referale i slično.</p>
                        </div>
                        <div class="pt-4 text-lg text-gray-900 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 text-indigo-600 flex-shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>                              
                            <p>Održavanje visoke razine produktivnosti: Ako zaposlenik kontinuirano održava visoku razinu produktivnosti i učinkovitosti.</p>
                        </div>
                        <div class="pt-4 text-lg text-gray-900 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 text-indigo-600 flex-shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>                              
                            <p>Doprinos pozitivnom radnom okruženju: Ako zaposlenik pridonosi pozitivnom radnom okruženju kroz svoj stav, ponašanje ili interakcije s kolegama.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</x-app-layout>
