<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('meetings', $user) }}
    @endsection

    @livewire('meetings.meetings', ['user' => $user])
</x-app-layout>
