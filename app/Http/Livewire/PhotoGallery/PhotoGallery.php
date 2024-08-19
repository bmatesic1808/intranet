<?php

namespace App\Http\Livewire\PhotoGallery;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Photo;

class PhotoGallery extends Component
{
    use WithFileUploads;

    public $photo;

    public function render()
    {
        return view('livewire.photo-gallery.photo-gallery', [
            'photos' => Photo::all()
        ]);
    }

    public function save(): void
    {
        $this->validate([
            'photo' => 'image',
        ]);

        $name = md5($this->photo . microtime()) . '.' . $this->photo->extension();

        $this->photo->storeAs('public/teambuilding', $name);

        Photo::create(['file_name' => 'teambuilding/' . $name]);

        $this->dispatchBrowserEvent('banner-message',  [
            'show' => true,
            'message' => 'Success! Photo uploaded successfully.',
            'style' => 'success'
        ]);
    }
}
