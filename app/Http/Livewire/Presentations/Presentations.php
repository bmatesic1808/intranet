<?php

namespace App\Http\Livewire\Presentations;

use App\Models\Presentation;
use App\Models\PresentationRating;
use Livewire\Component;

class Presentations extends Component
{
    public $searchTerm;
    public $score = 1;
    public $isModalVisible = false;
    public $isDestroyModalVisible = false;
    public $isEditModalVisible = false;
    public $presentationId;
    public $title;
    public $comments;
    public $url;
    public $isCompany = 0;
    public $rating;

    protected $listeners = ['updateInventoryView' => 'render'];

    public function render()
    {
        $searchString = '%' . $this->searchTerm . '%';

        return view('livewire.presentations.presentations', [
            'presentations' => Presentation::where('title', 'like', $searchString)->with('ratings')->get(),
        ]);
    }

    public function showCreateModal(): void
    {
        $this->reset();
        $this->isModalVisible = true;
    }

    public function showEditModal($id): void
    {
        $this->presentationId = $id;
        $this->isEditModalVisible = true;
        $this->loadPresentationModel();
    }

    public function showDestroyModal($id): void
    {
        $this->presentationId = $id;
        $this->isDestroyModalVisible = true;
    }

    public function loadPresentationModel(): void
    {
        $presentation = Presentation::find($this->presentationId);
        $this->title = $presentation->title;
        $this->comments = $presentation->comments;
        $this->url = $presentation->url;
        $this->isCompany = $presentation->company;
    }

    public function modalInputData(): array
    {
        return [
            'user_id' => auth()->id(),
            'title' => $this->title,
            'comments' => $this->comments,
            'url' => $this->url,
            'company' => $this->isCompany
        ];
    }

    public function createPresentation(): void
    {
        Presentation::create($this->modalInputData());

        $this->isModalVisible = false;
        $this->reset();

        $this->dispatchBrowserEvent('banner-message',  [
            'show' => true,
            'message' => 'Success! New presentation has been added.',
            'style' => 'success'
        ]);
    }

    public function updatePresentation(): void
    {
        Presentation::whereId($this->presentationId)->update($this->modalInputData());

        $this->isEditModalVisible = false;
        $this->reset();

        $this->dispatchBrowserEvent('banner-message',  [
            'show' => true,
            'message' => 'Success! Presentation has been updated.',
            'style' => 'success'
        ]);
    }

    public function deletePresentation(): void
    {
        Presentation::destroy($this->presentationId);
        $this->isDestroyModalVisible = false;

        $this->dispatchBrowserEvent('banner-message',  [
            'show' => true,
            'message' => 'Success! Presentation has been deleted.',
            'style' => 'success'
        ]);
    }

    public function rate($presentationId): void
    {
        $rating = new PresentationRating();
        $rating->user_id = auth()->id();
        $rating->presentation_id = $presentationId;
        $rating->rating = $this->score;
        $rating->save();

        $this->emit('saved');
        $this->reset();
    }
}
