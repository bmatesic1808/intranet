<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('teambuilding') }}
    @endsection

    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{-- <livewire:photo-gallery.photo-gallery /> --}}

        <div class="grid grid-cols-3 gap-5">
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full h-72 object-cover" src="{{ asset('images/photoshooting2022.jpg') }}">
                <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">
                    <a href="https://drive.google.com/drive/u/1/folders/1B63-wTsGxEyTihSAR-223tfDIrjM-jP4" class="hover:text-blue-500" target="_blank">
                        Photoshooting 2022.
                    </a>
                </div>
                </div>
            </div>
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full h-72 object-cover" src="{{ asset('images/photo2022behind.jpg') }}">
                <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">
                    <a href="https://drive.google.com/drive/u/1/folders/1h2JpfeHlqjiEmLI53nluW4I9Xp1B7eC2" class="hover:text-blue-500" target="_blank">
                        2022. - Behind The Scenes
                    </a>
                </div>
                </div>
            </div>

            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full h-72 object-cover" src="{{ asset('images/santa2022.jpg') }}">
                <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">
                    <a href="https://drive.google.com/drive/u/1/folders/15PnvMXrX6GMO08DXIiPFaB-DZm0J17F2" class="hover:text-blue-500" target="_blank">
                        Secret Santa 2022.
                    </a>
                </div>
                </div>
            </div>

            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full h-72 object-cover" src="{{ asset('images/tb-slovenija.jpg') }}">
                <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">
                    <a href="https://drive.google.com/drive/u/1/folders/1dMizAm6DIH0nG1_57iGGqoPRybgNI4vr" class="hover:text-blue-500" target="_blank">
                        TB Slovenija
                    </a>
                </div>
                </div>
            </div>

            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full h-72 object-cover" src="{{ asset('images/tb-baranja.jpg') }}">
                <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">
                    <a href="https://drive.google.com/drive/u/1/folders/1ICo8_2b2GeQqZJdNIJL_DYyFnsjd8Qqk" class="hover:text-blue-500" target="_blank">
                        TB Baranja
                    </a>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
