<div>
    <div class="grid grid-cols-3 gap-5">
        <div class="bg-white overflow-hidden shadow sm:rounded-lg p-5">
            <div class="text-center pb-5 font-semibold">{{ __('CEO pokazuje dobro razumijevanje projekata, zadataka i problematike.') }}</div>
            <div class="h-52 bg-blue-50 rounded-md">
                <livewire:livewire-line-chart
                    key="{{ $understandingChart->reactiveKey() }}"
                    :line-chart-model="$understandingChart"
                />
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow sm:rounded-lg p-5">
            <div class="text-center pb-5 font-semibold">{{ __('CEO mi dostavlja potrebne informacije u pravo vrijeme.') }}</div>
            <div class="h-52 bg-blue-50 rounded-md">
                <livewire:livewire-line-chart
                    key="{{ $rightTimeInfoChart->reactiveKey() }}"
                    :line-chart-model="$rightTimeInfoChart"
                />
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow sm:rounded-lg p-5">
            <div class="text-center pb-5 font-semibold">{{ __('CEO redovno dijeli relevantne informacije vezane uz firmu i projekte.') }}</div>
            <div class="h-52 bg-blue-50 rounded-md">
                <livewire:livewire-line-chart
                    key="{{ $companyInfoSharingChart->reactiveKey() }}"
                    :line-chart-model="$companyInfoSharingChart"
                />
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow sm:rounded-lg p-5">
            <div class="text-center pb-5 font-semibold">{{ __('CEO donosi teške odluke kvalitetno i efektivno.') }}</div>
            <div class="h-52 bg-blue-50 rounded-md">
                <livewire:livewire-line-chart
                    key="{{ $decisionsChart->reactiveKey() }}"
                    :line-chart-model="$decisionsChart"
                />
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow sm:rounded-lg p-5">
            <div class="text-center pb-5 font-semibold">{{ __('CEO komunicira jasne ciljeve i očekivanja.') }}</div>
            <div class="h-52 bg-blue-50 rounded-md">
                <livewire:livewire-line-chart
                    key="{{ $communicationChart->reactiveKey() }}"
                    :line-chart-model="$communicationChart"
                />
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow sm:rounded-lg p-5">
            <div class="text-center pb-5 font-semibold">{{ __('CEO drži tim fokusiran na prioritete.') }}</div>
            <div class="h-52 bg-blue-50 rounded-md">
                <livewire:livewire-line-chart
                    key="{{ $focusChart->reactiveKey() }}"
                    :line-chart-model="$focusChart"
                />
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow sm:rounded-lg p-5">
            <div class="text-center pb-5 font-semibold">{{ __('CEO efikasno upravlja mojim vremenom.') }}</div>
            <div class="h-52 bg-blue-50 rounded-md">
                <livewire:livewire-line-chart
                    key="{{ $timeManagementChart->reactiveKey() }}"
                    :line-chart-model="$timeManagementChart"
                />
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow sm:rounded-lg p-5">
            <div class="text-center pb-5 font-semibold">{{ __('CEO mi redovno daje konstruktivne povratne informacije o mom učinku.') }}</div>
            <div class="h-52 bg-blue-50 rounded-md">
                <livewire:livewire-line-chart
                    key="{{ $reviewsChart->reactiveKey() }}"
                    :line-chart-model="$reviewsChart"
                />
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow sm:rounded-lg p-5">
            <div class="text-center pb-5 font-semibold">{{ __('CEO mi daje autonomiju potrebnu za obavljanje posla.') }}</div>
            <div class="h-52 bg-blue-50 rounded-md">
                <livewire:livewire-line-chart
                    key="{{ $employeeAutonomyChart->reactiveKey() }}"
                    :line-chart-model="$employeeAutonomyChart"
                />
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow sm:rounded-lg p-5">
            <div class="text-center pb-5 font-semibold">{{ __('CEO je imao konstruktivan razgovor sa mnom o razvoju moje karijere u zadnjih 6 mjeseci.') }}</div>
            <div class="h-52 bg-blue-50 rounded-md">
                <livewire:livewire-line-chart
                    key="{{ $careerChart->reactiveKey() }}"
                    :line-chart-model="$careerChart"
                />
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow sm:rounded-lg p-5">
            <div class="text-center pb-5 font-semibold">{{ __('CEO uvažava moja razmišljanja i ideje, čak i kada su različita od njegovih.') }}</div>
            <div class="h-52 bg-blue-50 rounded-md">
                <livewire:livewire-line-chart
                    key="{{ $employeeIdeasChart->reactiveKey() }}"
                    :line-chart-model="$employeeIdeasChart"
                />
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow sm:rounded-lg p-5">
            <div class="text-center pb-5 font-semibold">{{ __('CEO ima stručna znanja potrebna da me efektivno vodi.') }}</div>
            <div class="h-52 bg-blue-50 rounded-md">
                <livewire:livewire-line-chart
                    key="{{ $knowledgeChart->reactiveKey() }}"
                    :line-chart-model="$knowledgeChart"
                />
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow sm:rounded-lg p-5">
            <div class="text-center pb-5 font-semibold">{{ __('CEO ima stručna znanja potrebna da me efektivno vodi.') }}</div>
            <div class="h-52 bg-blue-50 rounded-md">
                <livewire:livewire-line-chart
                    key="{{ $careChart->reactiveKey() }}"
                    :line-chart-model="$careChart"
                />
            </div>
        </div>
    </div>
</div>
