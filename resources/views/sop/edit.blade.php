<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('sop-edit', $sop) }}
    @endsection

    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('sop.update', $sop->id) }}" class="md:grid md:grid-cols-1 md:gap-6">
            {{ method_field('PUT') }}
            @csrf
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="title" value="{{ __('Title') }}" />
                            <x-jet-input id="title" type="text" class="mt-1 block w-full" name="title" autocomplete="title" value="{{ $sop->title }}" />
                            <x-jet-input-error for="title" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <x-jet-label for="title" value="{{ __('Category') }}" />
                            <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="sop_category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="category" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <x-jet-label for="video_tutorial" value="{{ __('Video tutorial') }}" />
                            <x-jet-input id="video_tutorial" type="text" class="mt-1 block w-full" name="video_tutorial" autocomplete="video_tutorial" value="{{ $sop->video_tutorial }}" />
                            <x-jet-input-error for="video_tutorial" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <x-jet-label for="overview" value="{{ __('Overview') }}" />
                            <x-jet-input id="overview" type="text" class="mt-1 block w-full" name="overview" autocomplete="overview" value="{{ $sop->overview }}" />
                            <x-jet-input-error for="overview" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <x-jet-label for="prerequisites" class="mb-1"  value="{{ __('Prerequisites') }}" />
                            <textarea name="prerequisites" id="prerequisites">{{ $sop->prerequisites }}</textarea>
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <x-jet-label for="procedure" class="mb-1"  value="{{ __('Procedure') }}" />
                            <textarea name="procedure" id="procedure">{{ $sop->procedure }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <x-jet-button>
                        {{ __('Save') }}
                    </x-jet-button>
                </div>
            </div>
        </form>
    </div>

    @push('javascript')
        <script src="https://cdn.tiny.cloud/1/9l2ufvqdjwn9irn1j3t8gae02srwnnmxzpra2pg089u79e0x/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: 'textarea#prerequisites',
                height: 300,
                menubar: true,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
            });
        </script>

        <script>
            tinymce.init({
                selector: 'textarea#procedure',
                height: 500,
                menubar: true,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
            });
        </script>
    @endpush
</x-app-layout>
