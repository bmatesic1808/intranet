<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('monthly-questionaire') }}
    @endsection

    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="bg-red-50 text-red-500 py-2 font-semibold mb-2 rounded px-2 border border-red-500">
                    <span class="mr-1">⦿</span>
                    {{ $error }}
                </div>
            @endforeach
        @endif

        <div class="mb-5">
            <a href="{{ route('monthly.my.archive') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-800 focus:outline-none focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                </svg>
                {{ __('Arhiva') }}
            </a>
        </div>

        <form action="{{ route('monthly.store') }}" method="POST">
            @csrf

            <input type="hidden" name="user_id" value="{{ auth()->id() }}">

            <div class="mb-10 block pb-5 bg-blue-50 rounded-md shadow">
                <div class="text-white bg-blue-500 font-semibold text-lg px-5 pb-4 pt-4 rounded-t-md">{{ __('Kakav ti je bio protekli mjesec? Molimo obratite posebnu pažnju na ocjenu zbog kasnije analitike!') }}</div>
                <hr>
                <div class="mt-5 py-5 flex justify-around">
                    <div>
                        <label class="inline-flex items-center py-3 px-10 bg-white rounded-full cursor-pointer shadow-md">
                            <input type="radio" class="form-radio" name="last_month_score" value="1" checked>
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center py-3 px-10 bg-white rounded-full cursor-pointer shadow-md">
                            <input type="radio" class="form-radio" name="last_month_score" value="2">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center py-3 px-10 bg-white rounded-full cursor-pointer shadow-md">
                            <input type="radio" class="form-radio" name="last_month_score" value="3">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center py-3 px-10 bg-white rounded-full cursor-pointer shadow-md">
                            <input type="radio" class="form-radio" name="last_month_score" value="4">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center py-3 px-10 bg-white rounded-full cursor-pointer shadow-md">
                            <input type="radio" class="form-radio" name="last_month_score" value="5">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Odlično (5)') }}</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="mb-10 block pb-5 bg-white rounded-md shadow">
                <div class="text-white bg-blue-500 font-semibold text-lg px-5 pb-4 pt-4 rounded-t-md">{{ __('Jesi li imao/la negativnih iskustava (objasni)?') }}</div>
                <hr>
                <div class="mt-5 mx-5 py-3">
                    <div>
                        <textarea rows="8" class="block w-full rounded-md" name="bad_experiences" placeholder="Vaš odgovor..." required>{{ old('bad_experiences') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="mb-10 block pb-5 bg-white rounded-md shadow">
                <div class="text-white bg-blue-500 font-semibold text-lg px-5 pb-4 pt-4 rounded-t-md">{{ __('Jesi li imao/la pozitivnih iskustava (objasni)?') }}</div>
                <hr>
                <div class="mt-5 mx-5 py-3">
                    <div>
                        <textarea rows="8" class="block w-full rounded-md" name="good_experiences" placeholder="Vaš odgovor..." required>{{ old('good_experiences') }}</textarea>
                    </div>
                </div>
            </div>


            <div class="mb-10 block pb-5 bg-white rounded-md shadow">
                <div class="text-white bg-blue-500 font-semibold text-lg px-5 pb-4 pt-4 rounded-t-md">{{ __('Što bi unaprijedilo tvoj posao svakodnevno? Što ti treba za maksimalnu produktivnost, odnosno što narušava tvoju produktivnost?') }}</div>
                <hr>
                <div class="mt-5 mx-5 py-3">
                    <div>
                        <textarea rows="5" class="block w-full rounded-md" name="job_improvement" placeholder="Vaš odgovor..." required>{{ old('job_improvement') }}</textarea>
                    </div>
                </div>
            </div>


            <div class="mb-10 block pb-5 bg-white rounded-md shadow">
                <div class="text-white bg-blue-500 font-semibold text-lg px-5 pb-4 pt-4 rounded-t-md">{{ __('Tvoj biggest win of the month?') }}</div>
                <hr>
                <div class="mt-5 mx-5 py-3">
                    <div>
                        <textarea rows="5" class="block w-full rounded-md" name="biggest_win" placeholder="Vaš odgovor..." required>{{ old('biggest_win') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="mb-10 block pb-5 bg-white rounded-md shadow">
                <div class="text-white bg-blue-500 font-semibold text-lg px-5 pb-4 pt-4 rounded-t-md">{{ __('Što ti je cilj ostvariti u sljedećem mjesecu?') }}</div>
                <hr>
                <div class="mt-5 mx-5 py-3">
                    <div>
                        <textarea rows="5" class="block w-full rounded-md" name="nextmonth_goal" placeholder="Vaš odgovor..." required>{{ old('nextmonth_goal') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="mb-10 block pb-5 bg-white rounded-md shadow">
                <div class="text-white bg-blue-500 font-semibold text-lg px-5 pb-4 pt-4 rounded-t-md">{{ __('Postoji li ikakav problem koji te sprječava u ostvarenju nekog zadatak ili cilja, ili ti je potrebna pomoć oko nečega?') }}</div>
                <hr>
                <div class="mt-5 mx-5 py-3">
                    <div>
                        <textarea rows="5" class="block w-full rounded-md" name="goal_blocker" placeholder="Vaš odgovor..." required>{{ old('goal_blocker') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="mb-10 block pb-5 bg-white rounded-md shadow">
                <div class="text-white bg-blue-500 font-semibold text-lg px-5 pb-4 pt-4 rounded-t-md">{{ __('Jesi li u ovom mjesecu prošao/la kroz edukaciju (s liste tvojih edukacija, nešto iz Slack channela "education" ili nešto treće - možda AI related)? Ako da, molim te napiši o čemu je riječ i ukratko napiši zaključak edukacije - je li bilo korisno, što si naučio/la, preporučuješ li edukaciju dalje, želiš li testirati nešto itd.') }}</div>
                <hr>
                <div class="mt-5 mx-5 py-3">
                    <div>
                        <textarea rows="5" class="block w-full rounded-md" name="month_education" placeholder="Vaš odgovor..." required>{{ old('month_education') }}</textarea>
                    </div>
                </div>
            </div>


            <div class="mb-10 block pb-5 bg-white rounded-md shadow">
                <div class="text-white bg-blue-500 font-semibold text-lg px-5 pb-4 pt-4 rounded-t-md">{{ __('Što ja mogu napraviti da ti olakšam svakodnevni posao? Postoji li neki dio posla u kojem misliš da ti mogu pomoći (inače i u sljedećih mjesec dana)?') }}</div>
                <hr>
                <div class="mt-5 mx-5 py-3">
                    <div>
                        <textarea rows="5" class="block w-full rounded-md" name="ceo_help" placeholder="Vaš odgovor..." required>{{ old('ceo_help') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="mb-10 block pb-5 bg-white rounded-md shadow">
                <div class="text-white bg-blue-500 font-semibold text-lg px-5 pb-4 pt-4 rounded-t-md">{{ __('Pitaj me što god želiš.') }}</div>
                <hr>
                <div class="mt-5 mx-5 py-3">
                    <div>
                        <textarea rows="5" class="block w-full rounded-md" name="ceo_question" placeholder="Vaš odgovor..." required>{{ old('ceo_question') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <x-jet-button class="text-base">
                    {{ __('Pošalji') }}
                </x-jet-button>
            </div>
        </form>
    </div>
</x-app-layout>
