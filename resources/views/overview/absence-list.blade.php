<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('management-absence') }}
    @endsection

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
        <div class="py-10">

            <div class="grid grid-cols-3 gap-5">
                @if($users->isNotEmpty())
                    @foreach($users as $user)
                        <div class="max-w-full bg-white shadow-lg rounded-lg overflow-hidden">
                            <div class="flex items-center px-6 py-3 bg-blue-50">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full object-cover"
                                        src="{{ $user->profile_photo_url }}"
                                        alt="{{ $user->name }}">
                                </div>
                                <div class="mx-3 font-semibold text-lg">{{ $user->name }}</div>
                            </div>
                            <div class="py-3 px-6">
                                <div class="py-2">
                                    @forelse($user->absences as $absence)
                                        <div class="flex items-center text-gray-800 py-2 bg-gray-50 mb-2 rounded">
                                            <div class="ml-2">
                                                {{ Carbon\Carbon::parse($absence->date_from)->format('d.m.Y.') }} - 
                                                {{ Carbon\Carbon::parse($absence->date_to)->format('d.m.Y.') }}
                                                <span><strong>{{ count($absence->absenceDates) }} @if(count($absence->absenceDates) < 2) dan @else dana @endif</strong></span>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="text-pink-500 bg-pink-50 px-5 py-3 rounded-md">
                                            {{ __('Zaposlenik nije koristio godišnji odmor.') }}
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </div>
</x-app-layout>