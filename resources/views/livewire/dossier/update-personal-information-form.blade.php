<div>
    <x-jet-form-section submit="updatePersonalInformation">
        <x-slot name="form">
            <!-- Country -->
            <div class="col-span-6 sm:col-span-2">
                <x-jet-label for="country" value="{{ __('Country') }}" />
                <x-jet-input id="country" type="text" class="mt-1 block w-full" wire:model.defer="country" autocomplete="country" />
                <x-jet-input-error for="country" class="mt-2" />
            </div>

            <!-- City -->
            <div class="col-span-6 sm:col-span-2">
                <x-jet-label for="city" value="{{ __('City') }}" />
                <x-jet-input id="city" type="text" class="mt-1 block w-full" wire:model.defer="city" autocomplete="city" />
                <x-jet-input-error for="city" class="mt-2" />
            </div>

            <!-- Country -->
            <div class="col-span-6 sm:col-span-2">
                <x-jet-label for="address" value="{{ __('Address') }}" />
                <x-jet-input id="address" type="text" class="mt-1 block w-full" wire:model.defer="address" autocomplete="address" />
                <x-jet-input-error for="address" class="mt-2" />
            </div>

            <!-- Postal code -->
            <div class="col-span-6 sm:col-span-2">
                <x-jet-label for="postal" value="{{ __('Postal Code') }}" />
                <x-jet-input id="postal" type="text" class="mt-1 block w-full" wire:model.defer="postal" autocomplete="postal" />
                <x-jet-input-error for="postal" class="mt-2" />
            </div>

            <!-- Phone -->
            <div class="col-span-6 sm:col-span-2">
                <x-jet-label for="phone" value="{{ __('Phone') }}" />
                <x-jet-input id="phone" type="text" class="mt-1 block w-full" wire:model.defer="phone" autocomplete="phone" />
                <x-jet-input-error for="phone" class="mt-2" />
            </div>

            <!-- Birthday -->
            <div class="col-span-6 sm:col-span-2">
                <x-jet-label for="birthday" value="{{ __('Birthday') }}" />
                <x-jet-input id="birthday" type="date" class="mt-1 block w-full" wire:model.defer="birthday" autocomplete="birthday" />
                <x-jet-input-error for="birthday" class="mt-2" />
            </div>

            <!-- Employment date -->
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="employment_date" value="{{ __('Employment date') }}" />
                <x-jet-input id="employment_date" type="date" class="mt-1 block w-full" wire:model.defer="employment_date" autocomplete="employment_date" />
                <x-jet-input-error for="employment_date" class="mt-2" />
            </div>

            <!-- Employment type -->
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="employment_type" value="{{ __('Employment type') }}" />
                <x-jet-input id="employment_type" type="text" class="mt-1 block w-full" wire:model.defer="employment_type" autocomplete="employment_type" />
                <x-jet-input-error for="employment_type" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>
