<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('employee-sick-leave', $employee) }}
    @endsection

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="pb-10">
                <livewire:sick-leave.sick-leave-form :employee="$employee" />
            </div>

            <div class="">
                <livewire:sick-leave.sick-leave-calendar :employee="$employee" before-calendar-view="calendar/before-calendar-view" />
            </div>
        </div>
    </div>
</x-app-layout>
