<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('equipment') }}
    @endsection

        @livewire('equipment.inventory')
        @livewire('equipment.charges')
</x-app-layout>

