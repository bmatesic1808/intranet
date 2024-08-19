<div>
    <x-jet-form-section submit="updateMetaProgram">
        <x-slot name="form">
            <!-- Motivation reason -->
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="motivationReason" value="{{ __('Motivation reason') }}" />
                <textarea wire:model.defer="motivationReason" id="motivationReason" class="mt-1 block w-full border-gray-300 rounded-md" rows="5"></textarea>
                <x-jet-input-error for="motivationReason" class="mt-2" />
            </div>

            <!-- Reference frame -->
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="referenceFrame" value="{{ __('Reference frame') }}" />
                <textarea wire:model.defer="referenceFrame" id="referenceFrame" class="mt-1 block w-full border-gray-300 rounded-md" rows="5"></textarea>
                <x-jet-input-error for="referenceFrame" class="mt-2" />
            </div>

            <!-- Activity mode -->
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="activityMode" value="{{ __('Activity mode') }}" />
                <textarea wire:model.defer="activityMode" id="activityMode" class="mt-1 block w-full border-gray-300 rounded-md" rows="5"></textarea>
                <x-jet-input-error for="activityMode" class="mt-2" />
            </div>

            <!-- Activity style -->
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="activityStyle" value="{{ __(' Activity style') }}" />
                <textarea wire:model.defer="activityStyle" id="activityStyle" class="mt-1 block w-full border-gray-300 rounded-md" rows="5"></textarea>
                <x-jet-input-error for="activityStyle" class="mt-2" />
            </div>

            <!-- Activity scope -->
            <div class="col-span-6 sm:col-span-6">
                <x-jet-label for="activityScope" value="{{ __('Activity scope') }}" />
                <textarea wire:model.defer="activityScope" id="activityScope" class="mt-1 block w-full border-gray-300 rounded-md" rows="5"></textarea>
                <x-jet-input-error for="activityScope" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:click="$refresh">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>
