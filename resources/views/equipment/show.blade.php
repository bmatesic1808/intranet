<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('equipment-show', $user) }}
    @endsection

    <div class="max-w-7xl mx-auto mt-10">
        <div class="w-full shadow rounded-lg bg-white mb-5">
            <div class="p-5 flex justify-center">
                @if($user->signature_photo_path)
                    <img src="{{ url('storage/' . $user->signature_photo_path) }}" alt="">
                @else
                    <div class="bg-pink-50 text-pink-500 p-5 w-full rounded-lg">{{ __('Emplotee has no signature yet.') }}</div>
                @endif
            </div>
        </div>

        <div class="w-full shadow rounded-lg bg-white">
            <div class="bg-white rounded-lg">
                @if($user->charges->isNotEmpty())
                    <div class="px-4 pt-3 pb-4 bg-white rounded-lg">
                        @foreach($user->charges as $charge)
                            <div class="flex justify-between items-center py-2">
                                <div class="">
                                    {{ $charge->device->item }}
                                </div>

                                <div>{{ $charge->device->inventory_number }}</div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

