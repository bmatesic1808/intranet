<?php

namespace App\Http\Livewire\Sop;

use App\Models\SopCategory;
use Livewire\Component;

class SopCategoryForm extends Component
{
    public $sopCategoryName;
    public $sopCategoryNewName;
    public $sopCategoryId;
    public $isDestroyModalVisible = false;
    public $isEditModalVisible = false;

    protected $rules = [
        'sopCategoryName' => 'required'
    ];

    public function render()
    {
        return view('livewire.sop.sop-category-form', [
            'sopCategories' => SopCategory::orderBy('name', 'ASC')->get()
        ]);
    }

    public function createNewSopCategory(): void
    {
        $this->validate();

        SopCategory::create([
           'name' => $this->sopCategoryName
        ]);

        $this->emit('saved');
        $this->emit('updateSopCardsView');
        $this->reset();
    }

    public function deleteSopCategory(): void
    {
        SopCategory::destroy($this->sopCategoryId);

        $this->isDestroyModalVisible = false;

        $this->emit('updateSopCardsView');
        $this->dispatchBrowserEvent('banner-message',  [
            'show' => true,
            'message' => 'Success! SOP category has been deleted.',
            'style' => 'success'
        ]);
    }

    public function showDestroyModal($id): void
    {
        $this->sopCategoryId = $id;
        $this->isDestroyModalVisible = true;
    }

    public function showEditModal($id): void
    {
        $this->sopCategoryId = $id;
        $this->isEditModalVisible = true;
        $this->loadCategoryModel();
    }

    public function loadCategoryModel(): void
    {
        $category = SopCategory::find($this->sopCategoryId);
        $this->sopCategoryNewName = $category->name;
    }

    public function updateSopCategory(): void
    {
        SopCategory::whereId($this->sopCategoryId)->update(['name' => $this->sopCategoryNewName]);

        $this->isEditModalVisible = false;
        $this->reset();

        $this->dispatchBrowserEvent('banner-message',  [
            'show' => true,
            'message' => 'Success! SOP category name has been updated.',
            'style' => 'success'
        ]);
    }
}
