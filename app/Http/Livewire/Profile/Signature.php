<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;

class Signature extends Component
{
    public $signature;

    protected $listeners = [
        'storeSignature'
    ];

    public function render()
    {
        return view('livewire.profile.signature');
    }

    public function storeSignature($value): void
    {
        if(!is_null($value)) {
            $this->signature = $value;
        }

        @list($type, $file_data) = explode(';', $this->signature);
        @list(, $file_data) = explode(',', $file_data);

        $imageName = Str::random(25).'.'.'png';

        Storage::put('/public/signature/' . $imageName, base64_decode($file_data));
        auth()->user()->signature_photo_path = 'signature/' . $imageName;
        auth()->user()->update();

        $this->emit('saved');
    }
}
