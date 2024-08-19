<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('ceo-questionaire') }}
    @endsection

    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('ceo.store') }}" method="POST">
            @csrf
            <div class="mb-10 block pb-5 bg-white rounded-md shadow">
                <div class="text-white bg-indigo-500 font-semibold text-xl pl-5 pb-4 pt-4 rounded-t-md">{{ __('CEO pokazuje dobro razumijevanje projekata, zadataka i problematike. ') }}</div>
                <hr>
                <div class="mt-5 flex justify-around">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="understanding" value="1" checked>
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="understanding" value="2">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="understanding" value="3">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="understanding" value="4">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="understanding" value="5">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Odlično (5)') }}</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="mb-10 block pb-5 bg-white rounded-md shadow">
                <div class="text-white bg-indigo-500 font-semibold text-xl pl-5 pb-4 pt-4 rounded-t-md">{{ __('CEO mi dostavlja potrebne informacije u pravo vrijeme.') }}</div>
                <hr>
                <div class="mt-5 flex justify-around">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="right_time_info" value="1" checked>
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="right_time_info" value="2">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="right_time_info" value="3">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="right_time_info" value="4">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="right_time_info" value="5">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Odlično (5)') }}</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="mb-10 block pb-5 bg-white rounded-md shadow">
                <div class="text-white bg-indigo-500 font-semibold text-xl pl-5 pb-4 pt-4 rounded-t-md">{{ __('CEO redovno dijeli relevantne informacije vezane uz firmu i projekte.') }}</div>
                <hr>
                <div class="mt-5 flex justify-around">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="company_info_sharing" value="1" checked>
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="company_info_sharing" value="2">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="company_info_sharing" value="3">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="company_info_sharing" value="4">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="company_info_sharing" value="5">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Odlično (5)') }}</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="mb-10 block pb-5 bg-white rounded-md shadow">
                <div class="text-white bg-indigo-500 font-semibold text-xl pl-5 pb-4 pt-4 rounded-t-md">{{ __('CEO donosi teške odluke kvalitetno i efektivno.') }}</div>
                <hr>
                <div class="mt-5 flex justify-around">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="decisions" value="1" checked>
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="decisions" value="2">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="decisions" value="3">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="decisions" value="4">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="decisions" value="5">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Odlično (5)') }}</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="mb-10 block pb-5 bg-white rounded-md shadow">
                <div class="text-white bg-indigo-500 font-semibold text-xl pl-5 pb-4 pt-4 rounded-t-md">{{ __('CEO komunicira jasne ciljeve i očekivanja.') }}</div>
                <hr>
                <div class="mt-5 flex justify-around">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="communication" value="1" checked>
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="communication" value="2">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="communication" value="3">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="communication" value="4">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="communication" value="5">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Odlično (5)') }}</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="mb-10 block pb-5 bg-white rounded-md shadow">
                <div class="text-white bg-indigo-500 font-semibold text-xl pl-5 pb-4 pt-4 rounded-t-md">{{ __('CEO drži tim fokusiran na prioritete.') }}</div>
                <hr>
                <div class="mt-5 flex justify-around">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="focus" value="1" checked>
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="focus" value="2">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="focus" value="3">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="focus" value="4">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="focus" value="5">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Odlično (5)') }}</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="mb-10 block pb-5 bg-white rounded-md shadow">
                <div class="text-white bg-indigo-500 font-semibold text-xl pl-5 pb-4 pt-4 rounded-t-md">{{ __('CEO efikasno upravlja mojim vremenom.') }}</div>
                <hr>
                <div class="mt-5 flex justify-around">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="time_management" value="1" checked>
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="time_management" value="2">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="time_management" value="3">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="time_management" value="4">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="time_management" value="5">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Odlično (5)') }}</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="mb-10 block pb-5 bg-white rounded-md shadow">
                <div class="text-white bg-indigo-500 font-semibold text-xl pl-5 pb-4 pt-4 rounded-t-md">{{ __('CEO mi redovno daje konstruktivne povratne informacije o mom učinku.') }}</div>
                <hr>
                <div class="mt-5 flex justify-around">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="reviews" value="1" checked>
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="reviews" value="2">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="reviews" value="3">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="reviews" value="4">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="reviews" value="5">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Odlično (5)') }}</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="mb-10 block pb-5 bg-white rounded-md shadow">
                <div class="text-white bg-indigo-500 font-semibold text-xl pl-5 pb-4 pt-4 rounded-t-md">{{ __('CEO mi daje autonomiju potrebnu za obavljanje posla (ne “mikro-menadžerira” ulaženjem u detalje kojima se ne treba baviti).') }}</div>
                <hr>
                <div class="mt-5 flex justify-around">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="employee_autonomy" value="1" checked>
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="employee_autonomy" value="2">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="employee_autonomy" value="3">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="employee_autonomy" value="4">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="employee_autonomy" value="5">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Odlično (5)') }}</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="mb-10 block pb-5 bg-white rounded-md shadow">
                <div class="text-white bg-indigo-500 font-semibold text-xl pl-5 pb-4 pt-4 rounded-t-md">{{ __('CEO je imao konstruktivan razgovor sa mnom o razvoju moje karijere u zadnjih 6 mjeseci.') }}</div>
                <hr>
                <div class="mt-5 flex justify-around">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="career" value="1" checked>
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="career" value="2">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="career" value="3">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="career" value="4">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="career" value="5">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Odlično (5)') }}</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="mb-10 block pb-5 bg-white rounded-md shadow">
                <div class="text-white bg-indigo-500 font-semibold text-xl pl-5 pb-4 pt-4 rounded-t-md">{{ __('CEO uvažava moja razmišljanja i ideje, čak i kada su različita od njegovih.') }}</div>
                <hr>
                <div class="mt-5 flex justify-around">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="employe_ideas" value="1" checked>
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="employe_ideas" value="2">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="employe_ideas" value="3">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="employe_ideas" value="4">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="employe_ideas" value="5">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Odlično (5)') }}</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="mb-10 block pb-5 bg-white rounded-md shadow">
                <div class="text-white bg-indigo-500 font-semibold text-xl pl-5 pb-4 pt-4 rounded-t-md">{{ __('CEO ima stručna znanja potrebna da me efektivno vodi.') }}</div>
                <hr>
                <div class="mt-5 flex justify-around">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="knowledge" value="1" checked>
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="knowledge" value="2">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="knowledge" value="3">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="knowledge" value="4">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="knowledge" value="5">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Odlično (5)') }}</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="mb-10 block pb-5 bg-white rounded-md shadow">
                <div class="text-white bg-indigo-500 font-semibold text-xl pl-5 pb-4 pt-4 rounded-t-md">{{ __('CEO kontinuirano pokazuje brigu prema meni kao osobi.') }}</div>
                <hr>
                <div class="mt-5 flex justify-around">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="care" value="1" checked>
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="care" value="2">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="care" value="3">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="care" value="4">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="care" value="5">
                            <span class="ml-2 font-semibold text-gray-600">{{ __('Odlično (5)') }}</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="mb-10 block pb-5 bg-white rounded-md shadow">
                <div class="text-white bg-indigo-500 font-semibold text-xl pl-5 pb-4 pt-4 rounded-t-md">{{ __('Što biste preporučili s čime bi vaš CEO trebao nastaviti?') }}</div>
                <hr>
                <div class="mt-5 mx-5 py-3">
                    <div>
                        <textarea class="block w-full rounded-md" rows="5" name="recommendation" placeholder="Vaš odgovor..."></textarea>
                    </div>
                </div>
            </div>

            <div class="mb-10 block pb-5 bg-white rounded-md shadow">
                <div class="text-white bg-indigo-500 font-semibold text-xl pl-5 pb-4 pt-4 rounded-t-md">{{ __('Što biste voljeli da vaš CEO promijeni ili poboljša?') }}</div>
                <hr>
                <div class="mt-5 mx-5 py-3">
                    <div>
                        <textarea rows="5" class="block w-full rounded-md" name="improvement" placeholder="Vaš odgovor..."></textarea>
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
