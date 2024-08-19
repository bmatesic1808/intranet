<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('points', $user) }}
    @endsection

    <div class="pb-20 pt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-5">
                @foreach($months as $month)
                    <div class="w-full shadow rounded-lg  bg-white">
                        <div class="bg-white rounded-lg">
                            <div class="p-2 bg-indigo-500 text-center rounded-t-lg">
                                <p class="uppercase tracking-widest text-sm text-white font-semibold">{{ $month }}</p>
                            </div>
                            @foreach($user->points as $point)
                                @if($point->date->format('F') === $month)
                                    <div class="flex px-4 py-2 text-gray-700">
                                        <div class="flex-1 inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                            </svg>
                                            <p>
                                                <span class="text-gray-900">{{ $point->date->format('Y') }},</span>
                                                <span class="font-bold">{{ $point->points . ' points' }}</span>
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
