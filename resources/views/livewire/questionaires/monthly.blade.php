<div>
    <div class="bg-white overflow-hidden shadow sm:rounded-lg p-5 mb-6">
        <div class="text-center pb-5 font-semibold text-xl">{{ __('Average employees score per month') }}</div>
        <div class="h-52 bg-blue-50 rounded-md">
                <livewire:livewire-line-chart
                    key="{{ $averageScoresChart->reactiveKey() }}"
                    :line-chart-model="$averageScoresChart"
                />
        </div>
    </div>
</div>
