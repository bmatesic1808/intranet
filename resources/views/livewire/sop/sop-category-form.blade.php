<div>
    <div class="bg-white px-3 pt-2 pb-5 rounded-md">
        <div class="flex justify-between items-center">
            <h1 class="text-gray-900 font-bold text-xl leading-8 my-2">{{ __('Categories') }}</h1>
            <x-jet-action-message class="mr-1" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>
        </div>

        @can('create_sop')
            <form wire:submit.prevent="createNewSopCategory">
                <div class="flex justify-between">
                    <x-jet-input type="text" class="w-full mr-2" wire:model.defer="sopCategoryName" placeholder="Add new category..."></x-jet-input>

                    <x-jet-button wire:loading.attr="disabled" wire:click="$refresh">
                        {{ __('Save') }}
                    </x-jet-button>
                </div>
                <x-jet-input-error for="sopCategoryName" class="mt-2" />
            </form>
        @endcan

        @if($sopCategories->isNotEmpty())
            <div class="pt-5">
                @foreach($sopCategories as $category)
                    <div class="text-gray-500 px-3 font-semibold flex justify-between items-center py-2.5">
                        <div>
                            <p>{{ $category->name }}</p>
                        </div>

                        @can('create_sop')
                            @include('livewire.sop.partials._dropdown-actions-category')
                        @endcan
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    @include('livewire.sop.partials._delete-category')
    @include('livewire.sop.partials._edit')
</div>
