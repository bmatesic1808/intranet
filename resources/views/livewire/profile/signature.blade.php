@push('styles')
    <style>
        button#clear {
            height: 100%;
            background: #4b00ff;
            border: 1px solid transparent;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
        }
        button#clear span {
            transform: rotate(90deg);
            display: block;
        }
    </style>
@endpush

<div>
    <div class="bg-white w-full rounded-md shadow">
        <div class="col-span-6 sm:col-span-6 px-5 py-3">
            <x-jet-label for="employment_type" value="{{ __('Signature') }}" />
            <div class="flex mt-1">
                @if(auth()->user()->signature_photo_path === null)
                    <div class="wrapper w-full border border-indigo-500 bg-gray-50">
                        <canvas id="signature-pad" class="" width="800" height="160"></canvas>
                    </div>
                    <div class="clear-btn">
                        <button id="clear" onclick="clearCanvas()"><span> Clear </span></button>
                    </div>

                @else
                    <div class="wrapper w-full bg-gray-50 rounded shadow-sm mb-3">
                        <img src="{{ url('storage/' . auth()->user()->signature_photo_path) }}" class="rounded-md" alt="teambuilding">
                    </div>
                @endif
            </div>

            <input wire:model="signature" type="hidden" />
        </div>

        @if(auth()->user()->signature_photo_path === null)
            <div class="mt-2 flex justify-end bg-gray-50 px-5 py-3 rounded-b-md items-center">
                <x-jet-action-message class="mr-3" on="saved">
                    {{ __('Saved.') }}
                </x-jet-action-message>

                <x-jet-secondary-button onclick="saveSignature()">
                    Save
                </x-jet-secondary-button>
            </div>
        @endif
    </div>
</div>

@push('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.3.5/signature_pad.min.js" integrity="sha512-kw/nRM/BMR2XGArXnOoxKOO5VBHLdITAW00aG8qK4zBzcLVZ4nzg7/oYCaoiwc8U9zrnsO9UHqpyljJ8+iqYiQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        let canvas = document.querySelector("canvas");
        let signaturePad = new SignaturePad(canvas);

        function clearCanvas() {
            signaturePad.clear()
        }

        function saveSignature() {
            Livewire.emit('storeSignature', signaturePad.toDataURL());
        }

    </script>
@endpush
