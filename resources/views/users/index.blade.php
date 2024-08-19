<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('users') }}
    @endsection

    @livewire('users.users')
</x-app-layout>
