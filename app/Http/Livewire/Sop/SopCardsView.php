<?php

namespace App\Http\Livewire\Sop;

use App\Models\Sop;
use App\Models\SopCategory;
use Livewire\Component;

class SopCardsView extends Component
{
    public $isDestroyModalVisible = false;
    public $sopId;

    protected $listeners = ['updateSopCardsView' => 'render'];

    public function render()
    {
        return view('livewire.sop.sop-cards-view',[
            'categories' => SopCategory::with('sops')->get(),
            'uncategorizedArticles' => Sop::where('sop_category_id', NULL)->get()
        ]);
    }

    public function showDestroyModal($id): void
    {
        $this->sopId = $id;
        $this->isDestroyModalVisible = true;
    }

    public function deleteSop(): void
    {
        Sop::destroy($this->sopId);

        $this->isDestroyModalVisible = false;

        $this->emit('updateSopCardsView');
        $this->dispatchBrowserEvent('banner-message',  [
            'show' => true,
            'message' => 'Success! SOP has been deleted.',
            'style' => 'success'
        ]);
    }
}
