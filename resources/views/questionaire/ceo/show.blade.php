<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('ceo-questionaire-archive') }}
    @endsection

    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-10 block pb-5 bg-white rounded-md shadow">
            <div class="text-white bg-indigo-500 font-semibold text-xl pl-5 pb-4 pt-4 rounded-t-md">{{ __('CEO pokazuje dobro razumijevanje projekata, zadataka i problematike. ') }}</div>
            <hr>
            <div class="mt-5 flex justify-around">
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="understanding" value="1" @if($questionaire->understanding === 1) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="understanding" value="2" @if($questionaire->understanding === 2) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="understanding" value="3" @if($questionaire->understanding === 3) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="understanding" value="4" @if($questionaire->understanding === 4) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="understanding" value="5" @if($questionaire->understanding === 5) checked @endif>
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
                        <input type="radio" class="form-radio" name="right_time_info" value="1" @if($questionaire->right_time_info === 1) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="right_time_info" value="2" @if($questionaire->right_time_info === 2) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="right_time_info" value="3" @if($questionaire->right_time_info === 3) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="right_time_info" value="4" @if($questionaire->right_time_info === 4) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="right_time_info" value="5" @if($questionaire->right_time_info === 5) checked @endif>
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
                        <input type="radio" class="form-radio" name="company_info_sharing" value="1" @if($questionaire->company_info_sharing === 1) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="company_info_sharing" value="2" @if($questionaire->company_info_sharing === 2) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="company_info_sharing" value="3" @if($questionaire->company_info_sharing === 3) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="company_info_sharing" value="4" @if($questionaire->company_info_sharing === 4) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="company_info_sharing" value="5" @if($questionaire->company_info_sharing === 5) checked @endif>
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
                        <input type="radio" class="form-radio" name="decisions" value="1" @if($questionaire->decisions === 1) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="decisions" value="2" @if($questionaire->decisions === 2) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="decisions" value="3" @if($questionaire->decisions === 3) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="decisions" value="4" @if($questionaire->decisions === 4) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="decisions" value="5" @if($questionaire->decisions === 5) checked @endif>
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
                        <input type="radio" class="form-radio" name="communication" value="1" @if($questionaire->communication === 1) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="communication" value="2" @if($questionaire->communication === 2) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="communication" value="3" @if($questionaire->communication === 3) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="communication" value="4" @if($questionaire->communication === 4) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="communication" value="5" @if($questionaire->communication === 5) checked @endif>
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
                        <input type="radio" class="form-radio" name="focus" value="1" @if($questionaire->focus === 1) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="focus" value="2" @if($questionaire->focus === 2) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="focus" value="3" @if($questionaire->focus === 3) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="focus" value="4" @if($questionaire->focus === 4) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="focus" value="5" @if($questionaire->focus === 5) checked @endif>
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
                        <input type="radio" class="form-radio" name="time_management" value="1" @if($questionaire->time_management === 1) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="time_management" value="2" @if($questionaire->time_management === 2) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="time_management" value="3" @if($questionaire->time_management === 3) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="time_management" value="4" @if($questionaire->time_management === 4) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="time_management" value="5" @if($questionaire->time_management === 5) checked @endif>
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
                        <input type="radio" class="form-radio" name="reviews" value="1" @if($questionaire->reviews === 1) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="reviews" value="2" @if($questionaire->reviews === 2) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="reviews" value="3" @if($questionaire->reviews === 3) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="reviews" value="4" @if($questionaire->reviews === 4) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="reviews" value="5" @if($questionaire->reviews === 5) checked @endif>
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
                        <input type="radio" class="form-radio" name="employee_autonomy" value="1" @if($questionaire->employee_autonomy === 1) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="employee_autonomy" value="2" @if($questionaire->employee_autonomy === 2) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="employee_autonomy" value="3" @if($questionaire->employee_autonomy === 3) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="employee_autonomy" value="4" @if($questionaire->employee_autonomy === 4) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="employee_autonomy" value="5" @if($questionaire->employee_autonomy === 5) checked @endif>
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
                        <input type="radio" class="form-radio" name="career" value="1" @if($questionaire->career === 1) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="career" value="2" @if($questionaire->career === 2) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="career" value="3" @if($questionaire->career === 3) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="career" value="4" @if($questionaire->career === 4) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="career" value="5" @if($questionaire->career === 5) checked @endif>
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
                        <input type="radio" class="form-radio" name="employe_ideas" value="1" @if($questionaire->employe_ideas === 1) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="employe_ideas" value="2" @if($questionaire->employe_ideas === 2) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="employe_ideas" value="3" @if($questionaire->employe_ideas === 3) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="employe_ideas" value="4" @if($questionaire->employe_ideas === 4) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="employe_ideas" value="5" @if($questionaire->employe_ideas === 5) checked @endif>
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
                        <input type="radio" class="form-radio" name="knowledge" value="1" @if($questionaire->knowledge === 1) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="knowledge" value="2" @if($questionaire->knowledge === 2) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="knowledge" value="3" @if($questionaire->knowledge === 3) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="knowledge" value="4" @if($questionaire->knowledge === 4) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="knowledge" value="5" @if($questionaire->knowledge === 5) checked @endif>
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
                        <input type="radio" class="form-radio" name="care" value="1" @if($questionaire->care === 1) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo loše (1)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="care" value="2" @if($questionaire->care === 2) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Loše (2)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="care" value="3" @if($questionaire->care === 3) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Dobro (3)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="care" value="4" @if($questionaire->care === 4) checked @endif>
                        <span class="ml-2 font-semibold text-gray-600">{{ __('Vrlo dobro (4)') }}</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="care" value="5" @if($questionaire->care === 5) checked @endif>
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
                    {{ $questionaire->recommendation }}
                </div>
            </div>
        </div>

        <div class="mb-10 block pb-5 bg-white rounded-md shadow">
            <div class="text-white bg-indigo-500 font-semibold text-xl pl-5 pb-4 pt-4 rounded-t-md">{{ __('Što biste voljeli da vaš CEO promijeni ili poboljša?') }}</div>
            <hr>
            <div class="mt-5 mx-5 py-3">
                <div>
                    {{ $questionaire->improvement }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
