<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('sop-show', $sop) }}
    @endsection

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 mr-2 mb-0.5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="font-light text-gray-600">{{ $sop->created_at->format('d/m/Y') }}</span>
                    </div>
                    <span class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded">
                        {{ $sop->sopCategory->name ?? 'Uncategorized' }}
                    </span>
                </div>
                <div class="mt-2">
                    <p class="text-3xl text-gray-500 font-bold">{{ $sop->title }}</p>
                    <hr class="my-3">
                    <div class="text-2xl text-gray-500 font-semibold mt-3">{{ __('Overview') }}</div>
                    <p class="mt-2 text-gray-600">{{ $sop->overview }}</p>
                </div>
            </div>

            <div class="p-6 mt-5 bg-white rounded-lg shadow-md">
                <div>
                    <div class="text-2xl text-gray-500 font-semibold">{{ __('Prerequisites') }}</div>
                    <div class="mt-2 text-gray-600">{!! $sop->prerequisites !!}</div>
                </div>
            </div>

            <div class="p-6 mt-5 bg-white rounded-lg shadow-md">
                <div>
                    <div class="text-2xl text-gray-500 font-semibold">{{ __('Procedure') }}</div>
                    <div class="mt-2 text-gray-600">{!! $sop->procedure !!}</div>
                </div>
            </div>

            <div class="p-6 mt-5 bg-white rounded-lg shadow-md">
                <div>
                    <div class="text-2xl text-gray-500 font-semibold">{{ __('Video tutorial') }}</div>
                    <div class="mt-5 flex justify-center">
                        <video width="951" height="561" controls>
                            <source src="{{ $sop->video_tutorial }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
