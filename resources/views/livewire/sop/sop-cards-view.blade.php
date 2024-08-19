<div>
    <div class="flex flex-wrap">
        @foreach($categories as $category)
            <div class="pb-2 w-full lg:w-1/2 xl:w-1/3 px-1">
                <div class="w-full shadow rounded-lg">
                    <div class="bg-white rounded-lg">
                        <div class="p-2 bg-indigo-500 text-center rounded-t-lg">
                            <p class="uppercase tracking-widest text-sm text-white">{{ $category->name }}</p>
                        </div>
                        <div class="flex px-4 py-3 text-gray-700">
                            <div class="flex-1 inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" class="h-6 w-6 text-gray-600 mr-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"/>
                                </svg>
                                <p><span class="text-gray-900 font-bold">{{ $category->sops->count() }}</span>&nbsp;{{ __('Articles') }}</p>
                            </div>
                        </div>
                        <div class="px-4 pt-3 pb-4 border-t border-gray-300 bg-white rounded-b-lg">
                            @foreach($category->sops as $article)
                                <div class="flex justify-between items-center py-2">
                                    <div>
                                        <p class="font-semibold">
                                            {{ $article->title }}
                                        </p>
                                    </div>

                                    @include('livewire.sop.partials._dropdown-actions-sop')
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @if($uncategorizedArticles->isNotEmpty())
            <div class="pb-2 w-full lg:w-1/2 xl:w-1/3 px-1">
                <div class="w-full shadow rounded-lg">
                    <div class="bg-white rounded-lg">
                        <div class="p-2 bg-indigo-500 text-center rounded-t-lg">
                            <p class="uppercase tracking-widest text-sm text-white">{{ __('Uncategorized') }}</p>
                        </div>
                        <div class="flex px-4 py-3 text-gray-700">
                            <div class="flex-1 inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" class="h-6 w-6 text-gray-600 mr-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"/>
                                </svg>
                                <p><span class="text-gray-900 font-bold">{{ $uncategorizedArticles->count() }}</span>&nbsp;{{ __('Articles') }}</p>
                            </div>
                        </div>
                        <div class="px-4 pt-3 pb-4 border-t border-gray-300 bg-white rounded-b-lg">
                            @foreach($uncategorizedArticles as $article)
                                <div class="flex justify-between items-center py-2">
                                    <div>
                                        <p class="font-semibold">
                                            {{ $article->title }}
                                        </p>
                                    </div>

                                    @include('livewire.sop.partials._dropdown-actions-sop')
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    @include('livewire.sop.partials._delete-sop')
</div>
