<div @if($eventClickEnabled)
         wire:click.stop="onEventClick('{{ $event['id']  }}')"
     @endif
     class="{{ $event['color']  }} text-white font-semibold p-1 rounded-md flex justify-start">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 mr-1">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
    </svg>

    <p class="text-xs font-semibold">
        {{ $event['title'] }}
    </p>
</div>
