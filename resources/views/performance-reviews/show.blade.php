<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('performance-review', $user) }}
    @endsection

    @livewire('performance-reviews.performance-reviews', ['user' => $user])
</x-app-layout>
