<div class="flex justify-between py-2">
    <button type="button" class="bg-gray-50 text-gray-500 rounded-md p-3 hover:bg-gray-200 flex items-center" wire:click.stop="goToPreviousMonth">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
        </svg>
    </button>

    <button type="button" class="bg-gray-50 text-gray-500 rounded-md p-3 flex hover:bg-gray-200" wire:click.stop="goToCurrentMonth">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        <span class="text-gray-500">
            @foreach($monthGrid->last() as $day)
                @if($loop->first)
                    {{ Carbon\Carbon::parse($day)->format('F') }}
                @endif
            @endforeach
        </span>
    </button>

    <button type="button" class="bg-gray-50 text-gray-500 rounded-md p-3 hover:bg-gray-200" wire:click.stop="goToNextMonth">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
        </svg>
    </button>
</div>
