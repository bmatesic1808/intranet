<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('company') }}
    @endsection

        <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-4 gap-4 sm:grid-cols-2">
                <div class="max-w-sm bg-white shadow-lg rounded-lg overflow-hidden my-4">
                    <img class="w-full h-32 object-cover object-center" src="{{ asset('images/docs.jpg') }}" alt="avatar">
                    <div class="flex items-center px-6 py-3 bg-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
                        </svg>
                        <h1 class="mx-3 text-white font-semibold text-lg">{{ __('Job Docs') }}</h1>
                    </div>
                    <div class="py-4 px-6">
                        <h1 class="text-2xl font-semibold text-gray-800">{{ __('Internal documents') }}</h1>
                        <div class="pt-2 text-lg text-blue-500 hover:text-blue-900">
                            <a href="https://drive.google.com/drive/u/0/folders/1_aVBOZiR0Igc1MEfNrbKdlL06pO-cOtn" target="_blank">Policies</a>
                        </div>

                        <div class="py-1 text-lg text-blue-500 hover:text-blue-900">
                            <a href="https://docs.google.com/document/d/1FsW8wkZMFkF0ST5yFlJIld7AoFxStVsFGmQUwliu8P0/edit" target="_blank">Employee Onboard</a>
                        </div>

                        <div class="py-1 text-lg text-blue-500 hover:text-blue-900">
                            <a href="https://docs.google.com/document/d/1gavyvn06mm2-qKPsZlCIiK4shv_6zq0TX46VdUGcGZE/edit" target="_blank">FAQ / QA</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
