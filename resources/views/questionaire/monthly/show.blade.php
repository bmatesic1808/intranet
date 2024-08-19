<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('employee-monthly-show', $questionaire) }}
    @endsection

    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-10 block pb-5 bg-blue-50 rounded-md shadow">
            <div class="text-white bg-blue-500 font-semibold text-lg px-5 pb-4 pt-4 rounded-t-md">{{ __('Kakav ti je bio protekli mjesec? Molimo obratite posebnu pažnju na ocjenu zbog kasnije analitike!') }}</div>
            <hr>
            <div class="mt-5 py-5 flex justify-around">
                <div>
                    <label class="inline-flex items-center py-3 px-10 bg-white rounded-full cursor-pointer shadow-md">
                        <input type="radio" class="form-radio" name="last_month_score" value="1" disabled @if($questionaire->last_month_score === 1) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center py-3 px-10 bg-white rounded-full cursor-pointer shadow-md">
                        <input type="radio" class="form-radio" name="last_month_score" value="2" disabled @if($questionaire->last_month_score === 2) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center py-3 px-10 bg-white rounded-full cursor-pointer shadow-md">
                        <input type="radio" class="form-radio" name="last_month_score" value="3" disabled @if($questionaire->last_month_score === 3) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center py-3 px-10 bg-white rounded-full cursor-pointer shadow-md">
                        <input type="radio" class="form-radio" name="last_month_score" value="4" disabled @if($questionaire->last_month_score === 4) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center py-3 px-10 bg-white rounded-full cursor-pointer shadow-md">
                        <input type="radio" class="form-radio" name="last_month_score" value="5" disabled @if($questionaire->last_month_score === 5) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Odlično (5)') }}</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="mb-10 block pb-5 bg-white rounded-md shadow">
            <div class="text-white bg-blue-500 font-semibold text-lg pl-5 pb-4 pt-4 rounded-t-md">{{ __('Jesi li imao/la negativnih iskustava (objasni)?') }}</div>
            <hr>
            <div class="mt-5 mx-5 py-3">
                <div>
                    {{ $questionaire->bad_experiences }}
                </div>
            </div>
        </div>

        <div class="mb-10 block pb-5 bg-white rounded-md shadow">
            <div class="text-white bg-blue-500 font-semibold text-lg pl-5 pb-4 pt-4 rounded-t-md">{{ __('Jesi li imao/la pozitivnih iskustava (objasni)?') }}</div>
            <hr>
            <div class="mt-5 mx-5 py-3">
                <div>
                    {{ $questionaire->good_experiences }}
                </div>
            </div>
        </div>


        <div class="mb-10 block pb-5 bg-white rounded-md shadow">
            <div class="text-white bg-blue-500 font-semibold text-lg pl-5 pb-4 pt-4 rounded-t-md">{{ __('Što bi unaprijedilo tvoj posao svakodnevno? Što ti treba za maksimalnu produktivnost, odnosno što narušava tvoju produktivnost?') }}</div>
            <hr>
            <div class="mt-5 mx-5 py-3">
                <div>
                    {{ $questionaire->job_improvement }}
                </div>
            </div>
        </div>



        <div class="mb-10 block pb-5 bg-white rounded-md shadow">
            <div class="text-white bg-blue-500 font-semibold text-lg px-5 pb-4 pt-4 rounded-t-md">{{ __('Tvoj biggest win of the month?') }}</div>
            <hr>
            <div class="mt-5 mx-5 py-3">
                <div>
                    {{ $questionaire->biggest_win }}
                </div>
            </div>
        </div>

        <div class="mb-10 block pb-5 bg-white rounded-md shadow">
            <div class="text-white bg-blue-500 font-semibold text-lg px-5 pb-4 pt-4 rounded-t-md">{{ __('Što ti je cilj ostvariti u sljedećem mjesecu?') }}</div>
            <hr>
            <div class="mt-5 mx-5 py-3">
                <div>
                    {{ $questionaire->nextmonth_goal }}
                </div>
            </div>
        </div>

        <div class="mb-10 block pb-5 bg-white rounded-md shadow">
            <div class="text-white bg-blue-500 font-semibold text-lg px-5 pb-4 pt-4 rounded-t-md">{{ __('Postoji li ikakav problem koji te sprječava u ostvarenju nekog zadatak ili cilja, ili ti je potrebna pomoć oko nečega?') }}</div>
            <hr>
            <div class="mt-5 mx-5 py-3">
                <div>
                    {{ $questionaire->goal_blocker }}
                </div>
            </div>
        </div>

        <div class="mb-10 block pb-5 bg-white rounded-md shadow">
            <div class="text-white bg-blue-500 font-semibold text-lg px-5 pb-4 pt-4 rounded-t-md">{{ __('Jesi li u ovom mjesecu prošao/la kroz edukaciju (s liste tvojih edukacija, nešto iz Slack channela "education" ili nešto treće - možda AI related)? Ako da, molim te napiši o čemu je riječ i ukratko napiši zaključak edukacije - je li bilo korisno, što si naučio/la, preporučuješ li edukaciju dalje, želiš li testirati nešto itd.') }}</div>
            <hr>
            <div class="mt-5 mx-5 py-3">
                <div>
                    {{ $questionaire->month_education }}
                </div>
            </div>
        </div>

        <div class="mb-10 block pb-5 bg-white rounded-md shadow">
            <div class="text-white bg-blue-500 font-semibold text-lg pl-5 pb-4 pt-4 rounded-t-md">{{ __('Što ja mogu napraviti da ti olakšam svakodnevni posao? Postoji li neki dio posla u kojem misliš da ti mogu pomoći (inače i u sljedećih mjesec dana)?') }}</div>
            <hr>
            <div class="mt-5 mx-5 py-3">
                <div>
                    {{ $questionaire->ceo_help }}
                </div>
            </div>
        </div>

        <div class="mb-10 block pb-5 bg-white rounded-md shadow">
            <div class="text-white bg-blue-500 font-semibold text-lg pl-5 pb-4 pt-4 rounded-t-md">{{ __('Pitaj me što god želiš. Sigurno te zanima barem jedna stvar.') }}</div>
            <hr>
            <div class="mt-5 mx-5 py-3">
                <div>
                    {{ $questionaire->ceo_question }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
