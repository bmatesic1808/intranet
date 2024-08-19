<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('absence') }}
    @endsection

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="pb-10">
                <livewire:absence.absence-form />
            </div>

            <div class="">
                <livewire:absence.absence-calendar
                    before-calendar-view="calendar/before-calendar-view"
                />
            </div>
        </div>
    </div>
</x-app-layout>

