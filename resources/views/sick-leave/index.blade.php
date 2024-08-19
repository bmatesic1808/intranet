<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('sick-leave') }}
    @endsection

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="pb-10">
                <livewire:sick-leave.sick-leave-form />
            </div>

            <div class="">
                <livewire:sick-leave.sick-leave-calendar
                    before-calendar-view="calendar/before-calendar-view"
                />
            </div>
        </div>
    </div>
</x-app-layout>

