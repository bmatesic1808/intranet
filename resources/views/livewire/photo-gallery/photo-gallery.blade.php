<div>
    <div class="container mx-auto">
        <div class="w-full">
            <div class="p-5 bg-white border rounded-md shadow-xl">
                <form wire:submit.prevent="save" class="flex justify-between items-center">
                    <div class="">
                        <input type="file" wire:model="photo" class="">
                        <div>
                            @error('photo') <span class="text-sm italic text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div wire:loading wire:target="photo" class="text-sm italic text-gray-500">Uploading...</div>
                    </div>

                    <x-jet-button>Save Photo</x-jet-button>
                </form>
            </div>
        </div>

        <div class="w-full mt-5">
            <div class="grid grid-cols-3 gap-2">
                @foreach($photos as $photo)
                    <div class="w-full">
                        <div class="w-full h-full">
                            <a href="{{ asset($photo->file_name) }}" target="_blank">
                                <img src="{{ url('storage/' . $photo->file_name) }}" class="rounded-md">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
