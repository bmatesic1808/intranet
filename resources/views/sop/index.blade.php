<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('sop') }}
    @endsection


    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <img class="w-full h-72 object-cover" src="{{ asset('images/sop.jpeg') }}">
            <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">
                <a href="https://drive.google.com/drive/folders/1tH5Y-vR1vZ0PBfaCNyHS7910Y2-Sj_Zi" class="hover:text-blue-500" target="_blank">
                    SOP List
                </a>
            </div>
            </div>
        </div>
    </div>

    {{-- <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap">

            <!-- Left Side -->
            <div class="w-full xl:w-3/12 lg:w-4/12 md:w-6/12 md:pr-3 sm:pr-0 mb-5">
                @can('create_sop')
                    <div class="mb-3">
                        <a href="{{ route('sop.create') }}">
                            <x-jet-secondary-button class="w-full h-11">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ __('Add new SOP') }}
                            </x-jet-secondary-button>
                        </a>
                    </div>
                @endcan

                <livewire:sop.sop-category-form />
            </div>

            <!-- Right Side -->
            <div class="w-full xl:w-9/12 lg:w-8/12 md:w-6/12 relative">
                <livewire:sop.sop-cards-view />
            </div>
        </div>
    </div> --}}
</x-app-layout>
