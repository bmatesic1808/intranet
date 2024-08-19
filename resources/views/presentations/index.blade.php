<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('presentations') }}
    @endsection

        @livewire('presentations.presentations')
</x-app-layout>

